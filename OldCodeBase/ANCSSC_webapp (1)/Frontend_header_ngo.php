<style>
    .logo {
        height: 6.4vw;
        width: auto;
        position: absolute;
        top: 1vw;
        left: 1vw;
    }

    a.myhome {
        position: absolute;
        background-color: white;
        color: #FCC05E;
        border-radius: 20px;
        text-decoration: none;
        top: 3.4vw;
        left: 10vw;
        font-weight: bold;
        font-family: sans-serif;
        font-size: calc(5px + 0.9vw);
    }

    a.myhome:hover {
        color: #4E515B;
    }

    a.sdgs {
        position: absolute;
        top: 3.4vw;
        left: 17vw;
        background-color: white;
        color: #FCC05E;
        border-radius: 20px;
        text-decoration: none;
        font-weight: bold;
        font-family: sans-serif;
        font-size:  calc(5px + 0.9vw);
        text-align: center;
    }

    a.sdgs:hover {
        color: #4E515B;
    }

    a.ngos {
        position: absolute;
        top: 3.4vw;
        left: 23vw;
        background-color: white;
        color: #FCC05E;
        border-radius: 20px;
        text-decoration: none;
        font-weight: bold;
        font-family: sans-serif;
        font-size: calc(5px + 0.9vw);
        text-align: center;
    }

    a.ngos:hover {
        color: #4E515B;
    }

    a.map {
        background-color: white;
        color: #FCC05E;
        position: absolute;
        top: 3.4vw;
        left: 32vw;
        border-radius: 20px;
        text-decoration: none;
        font-weight: bold;
        font-family: sans-serif;
        font-size: calc(5px + 0.9vw);
        text-align: center;
    }

    a.map:hover {
        color: #4E515B;
    }


    a.my_projects {
        background-color: white;
        color: #FCC05E;
        border-radius: 20px;
        text-decoration: none;
        position: absolute;
        top: 3.4vw;
        left: calc(33vw + 49px);
        font-weight: bold;
        font-family: sans-serif;
        font-size:  calc(5px + 0.9vw);
        text-align: center;
    }

    a.my_projects:hover {
        color: #4E515B;
    }

    a.resources {
        background-color: white;
        color: #FCC05E;
        border-radius: 20px;
        text-decoration: none;
        position: absolute;
        top: 3.4vw;
        left: calc(45vw + 49px);
        font-weight: bold;
        font-family: sans-serif;
        font-size: calc(5px + 0.9vw);
    }

    a.resources:hover {
        color: #4E515B;
    }

    a.search {
        background-color: white;
        color: #FCC05E;
        border-radius: 20px;
        text-decoration: none;
        position: absolute;
        top: 3.4vw;
        left: calc(56vw + 49px);
        font-weight: bold;
        font-family: sans-serif;
        font-size:  calc(5px + 0.9vw);
    }

    a.search:hover {
        color: #4E515B;
    }

    a.username {
        position: absolute;
        background-color: white;
        color: #4E515B;
        border-radius: 20px;
        text-decoration: none;
        right: 4.5vw;
        top: 3.4vw;
        font-weight: bold;
        font-family: sans-serif;
        font-size:  calc(4px + 0.9vw);
    }

    a.username:hover {
        color: #FCC05E;
    }

    .profilepicture {
        height: 2vw;
        width: auto;
        position: absolute;
        right: 1vw;
        top: 2.9vw;
    }

    a.logout {

        position: absolute;
        background-color: white;
        padding: 0.6vw 1.3vw;
        color: #4E515B;
        border-style: solid;
        border-width: 0.2vw;
        border-radius: 17px;
        border-color: firebrick;
        text-decoration: none;
        right: 12vw;
        top: 2.7vw;
        font-weight: bold;
        font-family: sans-serif;
        font-size:  calc(4px + 0.9vw);
        z-index: 1;
        margin-right: 2vw;
    }

    a.logout:hover {
        background-color: lightgrey;
        color: black;
    }

</style>


<div class="row">
    <div id="logo">
        <a href="Frontend_Welcome_NGO.php"><img class='logo' src="ANCSSC.png"></a>
    </div>
    <a class='myhome' href='Frontend_Welcome_NGO.php' title='home'>HOME</a>

    <a class='sdgs' href='Frontend_SDGs.php' title='sustainable development goals'>SDGs</a>

    <a class='ngos' href='Frontend_Members.php' title='member ngos'>MEMBERS</a>

    <a class='map' href='Frontend_Member_Map.php' title='member map'>MAP</a>

    <a class='my_projects' href='Frontend_NGO_My_Projects.php' title='my projects'>MY PROJECTS</a>

    <a class='resources' href='Frontend_Resources.php' title='resources'>RESOURCES</a>

    <a class='search' href='Frontend_Search.php' title='search'>SEARCH</a>

    <a class='logout' href='auth_logout.php' title='logout'>LOGOUT</a>

    <a class='username' href='Frontend_View_NGO_Details.php'
       title='my profile'><?php echo $_SESSION['user']['username']; ?></a>

    <img class='profilepicture' src="profile_pic.png">
</div>


    
