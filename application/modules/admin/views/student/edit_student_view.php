<style type="text/css">
    .btnadd{
        margin-left: 28px;
    }
    .btnright{
        margin-right: 28px;
    }
.m-lr-0{
    margin-left: 0px !important;
    margin-right: 0px !important;
}
.m-tb-0{
    margin-bottom: 0px !important;
    margin-top: 0px !important;
}

#integration-list {
    font-family: 'Open Sans', sans-serif;
    width: 100%;
    margin: 0 auto;
    display: table;
}
#integration-list ul {
    padding: 0;
}
#integration-list ul > li {
    list-style: none;
    border-top: 1px solid #ddd;
    display: block;
    padding: 10px;
    overflow: hidden;
}
#integration-list ul:last-child {
    border-bottom: 1px solid #ddd;
}
#integration-list ul > li:hover {
    background: #efefef;
}
.expand {
    text-decoration: none;
    color: #555;
    cursor: pointer;
}
h2 {
    
    font-size: 17px;
    font-weight: 400;
}
span {
    font-size: 12.5px;
}
#left,#right{
    display: table;
}
#sup{
    display: table-cell;
    vertical-align: middle;
    width: 80%;
}
.detail a {
    text-decoration: none;
    color: #C0392B;
    border: 1px solid #C0392B;
    padding: 6px 10px 5px;
    font-size: 14px;
}
.detail {
    display: none;
}
.detail span{
    margin: 0;
}
.right-arrow {
    margin-left: 20px;
    width: 10px;
    height: 100%;
    float: right;
    font-weight: bold;
    font-size: 20px;
}
.icon1 {
    height: 75px;
    width: 75px;
    float: left;
    margin: 0 15px 0 0;
}

</style>
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Student details</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/student/summary'); ?>">Student List</a></li>
            <li class="breadcrumb-item active">Student details</li>
        </ol>
    </div>
    <pre>
        <?php print_r($this->_ci_cached_vars); ?>
    </pre>
    <?php
    $enquiry_flag=0;
    //assigning enquiry_data
    if(isset($enquiery_data) && !empty($enquiery_data))
    {
        $enquiery_data=$enquiery_data[0];
    }
     ?>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <form class="form-horizontal">
                    <div class="row row-lg">
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4">
                            <h4 class="example-title">Enquiry agent</h4>
                            <input type="text" name="enquiery_date" value="<?php if(isset($enquiery_data->agent_fname)) { echo $enquiery_data->agent_fname." ".$enquiery_data->agent_lname; } ?>" readonly="" class="form-control">
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4">
                            <h4 class="example-title">Enquiry date</h4>
                            <input type="text" name="enquiery_date" value="<?php if(isset($enquiery_data->agent_fname)) { echo date("jS F Y, g:i a", strtotime($enquiery_data->enq_date)); } ?>" readonly="" class="form-control">
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4">
                            <h4 class="example-title">Source</h4>
                            <input type="text" name="enquiery_date" value="<?php if(isset($enquiery_data->source_name)) { echo $enquiery_data->source_name; } ?>" readonly="" class="form-control">
                        </div>
                    </div>
                    <div id="integration-list" class="mt-50">
                        <ul>
                            <li>
                                <a class="expand">
                                    <div class="right-arrow">+</div>
                                    <div>
                                        <h2 class="m-tb-0">Personal Details</h2>
                                    </div>
                                </a>
                                <div class="detail row row-lg">
                                    <div class="col-sm-12 col-md-12 mt-20">
                                        <div class="form-group row ">
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">First name</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <input type="text" name="enquiery_date" class="form-control ">
                                            </div>
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Last name</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <input type="text" name="enquiery_date" class="form-control ">
                                            </div>
                                        </div>


                                        <div class="form-group row mt-20">
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Email Id</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <input type="text" name="enquiery_date" class="form-control ">
                                            </div>
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Gender</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <select class="form-control">
                                                    <option hidden="">Select Gender</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-20">
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Phone number</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <input type="text" name="enquiery_date" class="form-control ">
                                            </div>
                                        </div>

                                        <div class="form-group row mt-20">
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Residing State</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <select class="form-control ">
                                                    <option hidden="">Select State</option>
                                                    <option value="1">Hot</option>
                                                    <option value="2">Cold</option>
                                                </select>
                                            </div>
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Residing City</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <select class="form-control ">
                                                    <option hidden="">Select City</option>
                                                    <option value="1">Hot</option>
                                                    <option value="2">Cold</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class="expand">
                                    <div class="right-arrow">+</div>
                                    <h2 class="m-tb-0">Professional Details</h2>
                                </a>

                                <div class="detail row row-lg">
                                    <div class="col-sm-12 col-md-12 mt-20">
                                        <div class="form-group row">
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Intro</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <input type="text" name="enquiery_date" class="form-control ">
                                            </div>
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Interested Program</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <select class="form-control" style="width: 44%">
                                                    <option hidden="">Select program</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Undergraduate degree</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <input type="text" name="enquiery_date" class="form-control ">
                                            </div>
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Undergraduate college</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <input type="text" name="enquiery_date" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Passing Year</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <input type="text" name="enquiery_date" class="form-control ">
                                            </div>
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Undergraduate marks(GPA)</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <input type="text" name="enquiery_date" class="form-control ">
                                            </div>
                                        </div><hr>
                                        <div class="form-group row">
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Postgraduate degree</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <input type="text" name="enquiery_date" class="form-control ">
                                            </div>
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Postgraduate college</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <input type="text" name="enquiery_date" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Passing Year</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <input type="text" name="enquiery_date" class="form-control ">
                                            </div>
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Postgraduate marks(GPA)</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <input type="text" name="enquiery_date" class="form-control ">
                                            </div>
                                        </div><hr>
                                        <div class="form-group row">
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Professional Qualification</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <input type="text" name="enquiery_date" class="form-control ">
                                            </div>
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Work experience</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <input type="text" name="enquiery_date" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Current Employer</label>
                                            <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                                <select class="form-control ">
                                                    <option hidden="">Yes/No</option>
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                </select>
                                            </div>

                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-2 col-lg-1" >Previous Employer 1</label>
                                            <div class="col-md-2 col-lg-2 col-sm-4  col-xl-2">
                                                <input type="text" name="enquiery_date" placeholder="if (yes)" class="form-control ">
                                            </div>

                                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Previous Employer 2</label>
                                            <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Select Enquiry Date" aria-label="Username" aria-describedby="basic-addon1">
                                                    <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div><hr>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-12">
                                                <h6>Remarks if any</h6>
                                                <textarea class="form-control" style="resize: none;"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-50" >
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">GMAT taken?</label>
                                            <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                                <select class="form-control ">
                                                    <option hidden="">Yes/No</option>
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                </select>
                                            </div>

                                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Score</label>
                                            <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                                <input type="text" name="enquiery_date" placeholder="if (yes)" class="form-control ">
                                            </div>

                                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Tenative date</label>
                                            <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Select Enquiry Date" aria-label="Username" aria-describedby="basic-addon1">
                                                    <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-50">
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">GRE taken?</label>
                                            <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                                <select class="form-control ">
                                                    <option hidden="">Yes/No</option>
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                </select>
                                            </div>

                                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Score</label>
                                            <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                                <input type="text" name="enquiery_date" placeholder="if (yes)" class="form-control ">
                                            </div>

                                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Tenative date</label>
                                            <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Select Enquiry Date" aria-label="Username" aria-describedby="basic-addon1">
                                                    <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-20" >
                                            <div class="col-md-6 col-lg-6 col-sm-6  col-xl-6 col-6">
                                                <button type="button" class="btn btn-success float-right">Save</button>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-sm-6  col-xl-6 col-6">
                                                <button type="button" class="btn btn-danger float-left">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class="expand">
                                    <div class="right-arrow">+</div>
                                    <h2 class="m-tb-0">Application Details</h2>
                                </a>
                                <div class="detail row row-lg">
                                    <div class="col-sm-12 col-md-12 mt-20">
                                        <div class="form-group row" >
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">GMAT taken?</label>
                                            <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                                <select class="form-control ">
                                                    <option hidden="">Yes/No</option>
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                </select>
                                            </div>

                                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Score</label>
                                            <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                                <input type="text" name="enquiery_date" placeholder="if (yes)" class="form-control ">
                                            </div>

                                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Tenative date</label>
                                            <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Select Enquiry Date" aria-label="Username" aria-describedby="basic-addon1">
                                                    <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row" >
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">GRE taken?</label>
                                            <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                                <select class="form-control ">
                                                    <option hidden="">Yes/No</option>
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                </select>
                                            </div>

                                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Score</label>
                                            <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                                <input type="text" name="enquiery_date" placeholder="if (yes)" class="form-control ">
                                            </div>

                                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Tenative date</label>
                                            <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Select Enquiry Date" aria-label="Username" aria-describedby="basic-addon1">
                                                    <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div><hr>
                                        <h5>Packages</h5>
                                        <div class="form-group row" >
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Sign up date</label>
                                            <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Select Enquiry Date" aria-label="Username" aria-describedby="basic-addon1">
                                                    <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                                </div>
                                            </div>

                                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Package name</label>
                                            <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                                <select class="form-control">
                                                    <option hidden="">Select Package</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                </select>
                                            </div>

                                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Consultant Assigned</label>
                                            <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                                <select class="form-control">
                                                    <option hidden="">Select Consultant</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-20" style="text-align: right">
                                            <div class="col-md-12 col-lg-12 col-sm-12  col-xl-12 col-12">
                                                <button type="button" class="btn btn-success">Submit</button>
                                                <button type="button" class="btn btn-warning ">Cancel</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div><hr>
                                        <div class="form-group row mt-50" >
                                            <div class="col-md-6 col-lg-6 col-sm-6  col-xl-6">
                                                <h5 class="title">College Applications</h5>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-sm-6  col-xl-6">
                                                <button type="button" class="btn btn-success float-right mr-30">Add more college</button>
                                            </div>
                                        </div>

                                        <div class="form-group row" >
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Applied college</label>
                                            <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                                <select class="form-control">
                                                    <option hidden="">Select Package</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                </select>
                                            </div>

                                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Intake year</label>
                                            <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                                <select class="form-control">
                                                    <option hidden="">Select Package</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                </select>
                                            </div>

                                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Application round</label>
                                            <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                                <select class="form-control">
                                                    <option hidden="">Select Consultant</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row" >
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Application status</label>
                                            <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                                <select class="form-control">
                                                    <option hidden="">Select Package</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                </select>
                                            </div>

                                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Interview status</label>
                                            <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                                <select class="form-control">
                                                    <option hidden="">Select Package</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                </select>
                                            </div>

                                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Applied program</label>
                                            <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                                <select class="form-control">
                                                    <option hidden="">Select Consultant</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row" >
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Admit status</label>
                                            <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                                <select class="form-control">
                                                    <option hidden="">Select Package</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                </select>
                                            </div>

                                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Scholarship awarded</label>
                                            <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                                <select class="form-control">
                                                    <option hidden="">Select Package</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                </select>
                                            </div>

                                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Scholarship amount</label>
                                            <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                                <select class="form-control">
                                                    <option hidden="">Select Consultant</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-20" style="text-align: right">
                                            <div class="col-md-12 col-lg-12 col-sm-12  col-xl-12 col-12">
                                                <button type="button" class="btn btn-success">Submit</button>
                                                <button type="button" class="btn btn-warning ">Cancel</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div><hr>
                                        <div class="form-group row" >
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Joining program</label>
                                            <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                                <select class="form-control ">
                                                    <option hidden="">Yes/No</option>
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                </select>
                                            </div>

                                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Joining college</label>
                                            <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                                <select class="form-control ">
                                                    <option hidden="">Yes/No</option>
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                </select>
                                            </div>

                                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Joining year</label>
                                            <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                                <select class="form-control ">
                                                    <option hidden="">Yes/No</option>
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-20" >
                                            <div class="col-md-6 col-lg-6 col-sm-6  col-xl-6 col-6">
                                                <button type="button" class="btn btn-success float-right">Save</button>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-sm-6  col-xl-6 col-6">
                                                <button type="button" class="btn btn-danger float-left">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- <li>
                                <a class="expand">
                                    <div class="right-arrow">+</div>
                                    <h2>Line Hardware</h2>
                                    <span>Pole, cable, pipe, coil pipe, flatbed, low-boy and equipment trailers.</span>
                                </a>

                                <div class="detail">
                                    <div id="left" style="width:15%;float:left;height:100%;">
                                        <div id="sup">
                                            <img src="http://www.linehardware.com/graphics/logo2.gif" width="100%" />
                                        </div>
                                    </div>
                                    <div id="right" style="width:85%;float:right;height:100%;padding-left:20px;">
                                        <div id="sup">
                                            <div><span>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</span>
                                                <br />
                                                <br /><a href="#">Visit Website</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>-->
                        </ul>
                    </div>
                    <div class="row row-lg mt-50">
                        <div class="col-sm-12 col-md-12 mt-20">
                            <h3 class="example-title ">Conversation Summary</h3>
                            <table id="store_list_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive " ><!-- data-plugin="dataTable" -->
                                <thead>
                                    <tr>
                                        <th>Followup Date</th>
                                        <th>Agent name</th>
                                        <th>Followup comment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>
                                            <button type="button" class="btn  btn-outline btn-success btn-sm"><i class="icon wb-plus" aria-hidden="true"></i></button>
                                            <button type="button" class="btn btn-outline btn-icon btn-warning btn-outline"><i class="icon wb-pencil" aria-hidden="true"></i></button>
                                            <button type="button" class="btn  btn-outline btn-danger btn-sm"><i class="icon wb-trash" aria-hidden="true"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Page -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        var table=$("#store_list_table").DataTable( {
            "order": [[ 0, "asc" ]],
            stateSave: true,
            responsive: true,
            "fnDrawCallback": function(e) {
                var elems = Array.prototype.slice.call(document.querySelectorAll('.switch'));
                elems.forEach(function(elem) {
                    if(!elem.hasAttribute("data-switchery")){
                        var switchery = new Switchery(elem,{color: '#3aa99e',secondaryColor: '#FF0000'});    
                    }
                });
                }
            })
        $("#store_list_table_length").append($("#manage_product"));
        $("#store_list_table_filter").prepend($("#stylelist"));
        
        $(".switch").change(function(event) {
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var changeCheckbox = $(this)[0];//target
            var data={is_active:changeCheckbox.checked,pk_id:$(changeCheckbox).data('id'),type:$(changeCheckbox).data('type'),[csrfName]:csrfHash};
            $.post("<?php echo base_url('admin/changeAllStatus') ?>", data, 
                function(data, textStatus, xhr) {
                    if(changeCheckbox.checked)
                    {
                        toastr_type="success";
                        str="Product Activated successfully";
                    }else{
                        toastr_type="warning";
                        str="Product Deactivated successfully";
                    }
                    toastr.options = {
                      "closeButton": true
                    }
                    toastr[toastr_type](str);
            });
        });
    });
    $(function() {
  $(".expand").on( "click", function() {
    $(this).next().slideToggle(200);
    $expand = $(this).find(">:first-child");
    
    if($expand.text() == "+") {
      $expand.text("-");
    } else {
      $expand.text("+");
    }
  });
});
</script>
