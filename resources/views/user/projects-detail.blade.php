@extends('layouts.mainlayout-logged-in')

@section('content')
<!DOCTYPE html>
<html lang="en">
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            
            <!-- Page Content-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center mb-5">
                                <h1 class="fw-bolder">Project title here</h1>
                                <h2 class="fw-bolder">Organisation name here</h2>
                                <!-- Note: SDGs may be better served by showing up with shiny pictures but we should review to see what works and what's feasible -->
                                <h2 class="fw-bolder">SDGs: SDGs here</h2>
                                <p class="lead fw-normal text-muted mb-0">This is the project description! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab similique, ducimus ut alias sit accusamus illum, asperiores deserunt dolorum quaerat qui! Ab, quisquam explicabo magni dolores unde beatae quam a.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col-12"><img class="img-fluid rounded-3 mb-5" src="https://dummyimage.com/1300x700/343a40/6c757d" alt="..." /></div>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center mb-5">
                                <p class="lead fw-normal text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam deserunt architecto enim eos accusantium fugit recusandae illo iste dignissimos possimus facere ducimus odit voluptatibus exercitationem, ex laudantium illum voluptatum corporis.</p>
                                <a class="text-decoration-none" href="#!">
                                    View project
                                    <i class="bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-5">
                        <h2 class="fw-bolder">Project reports</h1>
                        <table id="projects" class="table table-striped nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Report name</th>
                                    <th>Project name</th>
                                    <th>Organisation name</th>
                                    <th>Language</th>
                                    <th>Description</th>
                                    <th>SDGs</th>
                                    <th>Date added</th>
                                    <th>Last updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2018 water research</td>
                                    <td>Mexican water source</td>
                                    <td>WaterAid</td>
                                    <td>Spanish</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </td>
                                    <td>3, 11</td>
                                    <td>2018/11/13</td>
                                    <td>2019/12/12</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Report name</th>
                                    <th>Project name</th>
                                    <th>Organisation name</th>
                                    <th>Language</th>
                                    <th>Description</th>
                                    <th>SDGs</th>
                                    <th>Date added</th>
                                    <th>Last updated</th>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>



<?php

  $item_id = $_GET['item_id'];
  $listing_details = get_listing_details($item_id);
  $num_bids = $listing_details['numBids'];
  $current_price = $listing_details['currentPrice'];
  $reserve_price = $listing_details['reservePrice'];
  if ($num_bids > 0) {
    $current_high_bidder = $listing_details['highBidder'];
  }

  $title = $listing_details['shortDescription'];
  $description = $listing_details['fullDescription'];
  $end_time = new DateTime($listing_details['endDateTime']);

  // TODO: Note: Auctions that have ended may pull a different set of data,
  //       like whether the auction ended in a sale or was cancelled due
  //       to lack of high-enough bids. Or maybe not.
  
  // Calculate time to auction end:
  $now = new DateTime();
  
  if ($now < $end_time) {
    $time_to_end = date_diff($now, $end_time);
    $time_remaining = ' (in ' . display_time_remaining($time_to_end) . ')';
  }

  $watching = false;
?>
<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
  
  $user_id = $_SESSION['userID'];
  $listing_id = $_GET['item_id'];
  $watching = get_watch_status($user_id,$listing_id);
}
?>

<?php
// The below redirects if the itemID doesn't exist

  $listing_id = $_GET['item_id'];
  if (checklistingexists($listing_id) == FALSE){
  header('Location: error_404.php');
  }

?>

<div class="container">

<div class="row"> <!-- Row #1 with auction title + watch button -->
  <div class="col-sm-8"> <!-- Left col -->
    <h2 class="my-3"><?php echo($title); ?></h2>
  </div>
  <div class="col-sm-4 align-self-center"> <!-- Right col -->
<?php
  /* The following watchlist functionality uses JavaScript, but could
     just as easily use PHP as in other places in the code */
  if ($now < $end_time):
?>
    <div id="watch_nowatch" <?php if ($_SESSION["logged_in"] && $watching) echo('style="display: none"');?> >
      <button type="button" class="btn btn-outline-secondary btn-sm" onclick="addToWatchlist()">+ Add to watchlist</button>
    </div>
    <div id="watch_watching" <?php if (!$_SESSION["logged_in"] || !$watching) echo('style="display: none"');?> >
      <button type="button" class="btn btn-success btn-sm" disabled>Watching</button>
      <button type="button" class="btn btn-danger btn-sm" onclick="removeFromWatchlist()">Remove watch</button>
    </div>
<?php endif /* Print nothing otherwise */ ?>
  </div>
</div>

<!-- Item description -->

<div class="row"> 
  <div class="col-sm-8"> 
    <div class="itemDescription"> 
    <?php echo($description); ?>
    </div>
  </div>
</div>


<!-- Images -->

<div class="row"> 
  <div class="col-sm-8"> 

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      
      <div class="carousel-inner">
        <?php 
          $result = get_multiple_imagePaths($item_id); 
          $count = 0; 

          while ($row = $result->fetch_assoc()) {
            $path = image_path_from_row($row);
            if ($count == 0) {
              echo $path;
              echo '<div class="carousel-item active" style="background-color: #FFFFFF">';
              $count = $count + 1;
            } else {
              echo '<div class="carousel-item" style="background-color: #FFFFFF">';
            }  
            
            $count = $count + 1;
        
            echo '<img class="d-block w-100" src="' . $path . '" alt="First slide"  style="height:500px; width: auto !important; margin:auto;">';
            echo '</div>';} // End div for each item
        ?>
          </div> <!-- end of carousel-inner -->
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div> <!-- end of whole carousel object -->
    </div>
    


 

<div class="col-sm-4"> <!-- Right col with bidding info -->



<?php 

//Logic for e-mails being sent after - Commented out as cronjob/functions now take care of this
if ($now > $end_time):
  //{
  //if ($current_price < $reserve_price)
  //{
    //auction_end_reserve_not_met($listing_id);
  //}
  //else if ($current_price > $reserve_price)
  //{
    //auction_end($listing_id);};
  //}
?>
     This auction ended <?php echo(date_format($end_time, 'j M H:i')) ?>


     <!-- TODO: Print the result of the auction here? -->
  <?php else: ?>
      <p>Auction ends <?php echo(date_format($end_time, 'j M H:i') . $time_remaining) ?></p>  
      <p class="lead">Current bid: £<?php echo(number_format($current_price, 2)) ?></p>
      <p class="lead">Total number of bids: <?php print_r($num_bids) ?></p>
      <?php if ($current_price < $reserve_price): ?>
        <p class="lead">Reserve not met</p>
      <?php endif ?>
      <?php if ($_SESSION["logged_in"] and $_SESSION["account_type"] == "buyer"): ?>
      <!-- Bidding form -->
        <?php if ($current_high_bidder == $_SESSION["userID"]): ?>
          <p class="lead">You are currently the highest bidder</p>
        <?php else: ?>
        <form action="javascript:void(0);">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">£</span>
            </div>
          <input type="number" step="0.1" class="form-control" id="bid" required>
          </div>
          <button type="submit" class="btn btn-primary form-control" onclick="placeBid();" >Place bid</button>
        </form>
        <?php endif ?>
      <?php else: ?>
      <p>You must be logged in as a bidder to place a bid.</p>
      <?php endif ?>
  <?php endif ?>

  
  </div> <!-- End of right col with bidding info -->

</div> <!-- End of row #2 -->

</div>


<script> 
// JavaScript functions: addToWatchlist and removeFromWatchlist.

function placeBid(button) {
  $.ajax(
    "place_bid.php", {
      type: "POST",
      data: {
        item_id: <?php echo($item_id); ?>,
        bid_amount: $("#bid").val()
      },
      success:
        function(obj) {
          if (obj["success"]) {
            console.log("Bid successfully placed");
            alert("Bid successfully placed");
            location.reload();
          }
          else {
            console.log("Error placing bid");
            console.log(obj["message"]);
            alert(obj["message"]);
            location.reload();
          }
        },
      error:
        function (obj, textstatus) {
          console.log("Error");
          alert("Error processing request, please try again later");
          location.reload();
        }
    })
}

function addToWatchlist(button) {
  console.log("These print statements are helpful for debugging btw");

  // This performs an asynchronous call to a PHP function using POST method.
  // Sends item ID as an argument to that function.
  $.ajax('watchlist_funcs.php', {
    type: "POST",
    data: {functionname: 'add_to_watchlist', arguments: [<?php echo($item_id);?>]},

    success: 
      function (obj, textstatus) {
        // Callback function for when call is successful and returns obj
        console.log("Success");
        var objT = obj.trim();
 
        if (objT == "success") {
          $("#watch_nowatch").hide();
          $("#watch_watching").show();
        }
        else {
          var mydiv = document.getElementById("watch_nowatch");
          mydiv.appendChild(document.createElement("br"));
          mydiv.appendChild(document.createTextNode("Add to watch failed. Try again later."));
        }
      },

    error:
      function (obj, textstatus) {
        console.log("Error");
      }
  }); // End of AJAX call

} // End of addToWatchlist func

function removeFromWatchlist(button) {
  // This performs an asynchronous call to a PHP function using POST method.
  // Sends item ID as an argument to that function.
  $.ajax('watchlist_funcs.php', {
    type: "POST",
    data: {functionname: 'remove_from_watchlist', arguments: [<?php echo($item_id);?>]},

    success: 
      function (obj, textstatus) {
        // Callback function for when call is successful and returns obj
        console.log("Success");
        var objT = obj.trim();
 
        if (objT == "success") {
          $("#watch_watching").hide();
          $("#watch_nowatch").show();
        }
        else {
          var mydiv = document.getElementById("watch_watching");
          mydiv.appendChild(document.createElement("br"));
          mydiv.appendChild(document.createTextNode("Watch removal failed. Try again later."));
        }
      },

    error:
      function (obj, textstatus) {
        console.log("Error");
      }
  }); // End of AJAX call

} // End of addToWatchlist func
</script>

<?php include_once("footer.php") ?>
@endsection