@extends('teachers.layout.app')

@section('title','Courses')

@section('content')

<div class="container-fluid main-content">

    <div class="row-fluid">
        <div class="span6">
            <h2>Dashboard</h2>
        </div>
    </div>
    <div style="height:20px;"></div>

    <div class="row-fluid">
        <!--/span-->
        <div class="span12" id="content">
            <div class="row-fluid"></div>

            <div class="row-fluid">

                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Data Numbers</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">

                            <div class="span3">
                                <div class="chart" data-percent="100">
                                    100</div>
                                <div class="chart-bottom-heading"><strong>Registered Teacher</strong>

                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- /block -->

                </div>
            </div>
        </div>
    </div>


</div>

@endsection
