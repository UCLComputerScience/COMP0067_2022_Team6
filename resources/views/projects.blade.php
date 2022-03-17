<!-- TODO: 
1. Get filtering to work for projects table
2. After filtering is working, copy-paste projects table section and change columns + contents for reports -->

@extends('layouts.mainlayout')
@section('content')

<!DOCTYPE html>
<html lang="en">
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            
            <!-- Page Content-->
            <section class="py-5">
                <div class="text-center mb-5">
                        <h1 class="fw-bolder">Projects</h1>
                        <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                </div>
                <div class="text-center mb-5">
                        <h2 class="fw-bolder">Project locations</h1>
                        <p class="lead fw-normal text-muted mb-0">(map to come)</p>
                </div>
                <div class="container px-5 my-5">
                    <div class="text-center mb-5">
                            <h2 class="fw-bolder">Project information</h1>
                            <p class="lead fw-normal text-muted mb-0">(explanatory text for the table below goes here)</p>
                    </div>

                    <!-- Project table -->
                    <table id="projects" class="table table-striped nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>#Project name</th>
                                <th>Organisation name</th>
                                <th>Location</th>
                                <th>Language</th>
                                <th>Description</th>
                                <th>SDGs</th>
                                <th>Date added</th>
                                <th>Last updated</th>
                            </tr>
                        </thead>
                    <tbody>
                        <tr>
                            <td>Mexican water source</td>
                            <td>WaterAid</td>
                            <td>Mexico</td>
                            <td>Spanish</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </td>
                            <td>3, 11</td>
                            <td>2018/11/13</td>
                            <td>2019/12/12</td>
                        </tr>
                        <tr>
                            <td>Very important project</td>
                            <td>Oxfam</td>
                            <td>Brazil</td>
                            <td>English</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </td>
                            <td>12</td>
                            <td>2019/1/3</td>
                            <td>2021/5/12</td>
                        </tr>
                        <tr>
                            <td>1000 houses</td>
                            <td>GlobalGiving</td>
                            <td>Argentina</td>
                            <td>English</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </td>
                            <td>1, 4, 5, 6</td>
                            <td>2021/1/3</td>
                            <td>2021/1/3</td>
                        </tr>
                    </tbody>
                <tfoot>
                    <tr>
                        <th>Project name</th>
                        <th>Organisation name</th>
                        <th>Location</th>
                        <th>Language</th>
                        <th>Description</th>
                        <th>SDGs</th>
                        <th>Date added</th>
                        <th>Last updated</th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Report table -->
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                        <h2 class="fw-bolder">Project reports</h1>
                        <p class="lead fw-normal text-muted mb-0">(explanatory text for the table below goes here)</p>
                </div>
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
                    <tr>
                        <td>Super important report</td>
                        <td>Very important project</td>
                        <td>Oxfam</td>
                        <td>English</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </td>
                        <td>12</td>
                        <td>2019/1/3</td>
                        <td>2021/5/12</td>
                    </tr>
                    <tr>
                        <td>1st house</td>
                        <td>1000 houses</td>
                        <td>GlobalGiving</td>
                        <td>English</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </td>
                        <td>1, 4, 5, 6</td>
                        <td>2021/1/3</td>
                        <td>2021/1/3</td>
                    </tr>
                </tbody>
            <tfoot>
                <tr>
                    <th>Project name</th>
                    <th>Organisation name</th>
                    <th>Location</th>
                    <th>Language</th>
                    <th>Description</th>
                    <th>SDGs</th>
                    <th>Date added</th>
                    <th>Last updated</th>
                </tr>
            </tfoot>
        </table>
    </div>

            </section>
        </main>
    </body>
</html>
@endsection