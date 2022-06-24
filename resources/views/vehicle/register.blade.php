@extends('layouts.registerform')
@section('content')
    <section class="registration-form mt-5">

        <div class="container">
            <div class="card" style="box-shadow:3px 6px 7px #d4d2d2;">
                <div class="card-body">
                    <form action="" class="vehicle-form mt-4">

                        <div class="row r-main">
                            <div class="col-md-8">
                                <div class="main-title">
                                    <h2>Service Order Form</h2>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Phone#./
                                        WhatsApp: </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                        for="name">E-mail:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Make:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                        for="name">Model:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Year:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Lic.
                                        Plate:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Chassis#/
                                        Vin#:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="registration-info">
                                    <img src="{{ asset('assets') }}/images/logo.png" alt="">
                                    <div class="info-details">
                                        <p> Address: Dr. M.J. Hugenholtzweg #44<br />
                                            Phone number: (5999)-461-1422<br />
                                            Fax number: (5999)-465-1422<br />
                                            info@carfix-cur.com
                                        </p>
                                    </div>
                                    <div class="reg-no">
                                        <p>2020-001 </p>
                                    </div>
                                    <div class="reg-date">
                                        <div class="row">
                                            <div class="form-group d-flex">
                                                <label class="col-form-label col-md-5 col-sm-5 label-align"
                                                    for="name">Date:</label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="date" name="date" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group d-flex">
                                                <label class="col-form-label col-md-5 col-sm-5 label-align"
                                                    for="name">Time:</label>
                                                <div class="col-md-9 col-sm-9 ml-2">
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label" for="inlineCheckbox1">AM</label>

                                                        <input class="form-check-input ml-2" type="checkbox"
                                                            id="inlineCheckbox1" value="option1">
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label" for="inlineCheckbox2">PM</label>

                                                        <input class="form-check-input ml-2" type="checkbox"
                                                            id="inlineCheckbox2" value="option2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 no-gutters justify-content-center remarks-area">

                            <label class="col-form-label col-md-2 col-sm-2 " for="name">Remarks:</label>
                            <div class="col-md-7 col-sm-7 ">
                                <textarea class="w-100" name="" id="" ></textarea>
                            </div>
                        </div>
                        <div class="r-description text-center">
                                <p>Disclaimer: Please be aware that a diagnostic fee can be applied to your total bill. Partial
                                    or complete payment can be required in advance before work is done.</p>
                                <p>Payment MUST be cancelled in full before vehicle leaves the garage. Vehicles left more than
                                    2 days after completion of</p>
                                <p>job can be charged aNAFL. 15,- storage fee per day or the maximum amount allowed by law. We
                                    are not responsible for your vehicle</p>
                                <p>during this period. Vehicles left for more than 30 days can be auctioned off or sold for the
                                    open balance.</p>
                               <p class="d-flex mb-0 align-items-end justify-content-center"> I have read the disclaimer and agree
                                <input type="text" class="agreement-input" name="" id="" style="width: 100px;">
                               </p>                        
                        </div>
                        <div class="complaints">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="complaints-meta">
                                        <h6>Complaints/Description</h6>
                                        <div class="form-group">
                                           <textarea class="w-100" name="" id="" ></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 d-flex justify-content-end px-0">
                                                <label for="" class="signature-label mb-0 pr-2">I hereby agree with<br>
                                                    the above mention<br>
                                                    by signing this</label>
                                            </div>
                                            <div class="col-md-4 pl-0">
                                                <label for="">Signature;</label>
                                                <input type="text" class="form-control" >
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="complaint-checkboxes mt-3">
                                                <div class="form-check form-check-inline d-flex justify-content-between">
                                                    <label class="form-check-label" for="inlineCheckbox1">Complaint list checked?</label>
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                  </div>
                                                  <div class="form-check form-check-inline d-flex justify-content-between">
                                                    <label class="form-check-label" for="inlineCheckbox2">Vehicle is clean?
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">                                                
                                                  </div>
                                                  <div class="form-check form-check-inline d-block d-flex justify-content-between">
                                                    <label class="form-check-label" for="inlineCheckbox1">Others</label>
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                  </div>
                                            </div>
                                            <div class="inspect-input mt-3">
                                                <div class="form-group">
                                                    <label for="" class="mb-0 pl-2">Inspected by:</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mechanic-content mt-3">
                                                <label for="" class="mb-0">Mechanic(s)</label>
                                                <input type="text" class="form-control">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="overall-remarks">
                                <label for="">Overall Remarks</label>
                                <textarea name="" class="w-100"></textarea>
                                <strong class="text-center d-block">Thanyou for your Business</strong>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
