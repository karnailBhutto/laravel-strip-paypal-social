@extends('layouts.app')
@section('content')

<div class="container">



    <h1 class="text-center">Checkout Form</h1>
    <h2 class="text-left">Billing Details</h2>


    <div class="row">

        <div>

            <div>

                <div class="">



                    @if ($message = Session::get('success'))
                    <div class="custom-alerts alert alert-success fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        {!! $message !!}
                    </div>
                    <?php Session::forget('success');?>
                    @endif

                    @if ($message = Session::get('error'))
                    <div class="custom-alerts alert alert-danger fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        {!! $message !!}
                    </div>
                    <?php Session::forget('error');?>
                    @endif


                    <form class="require-validation" method="POST" id="payment-form" role="form" action="{!! URL::route('paypal') !!}" >
                        {{ csrf_field() }}


                        <div class='col-md-6'>

                            <div class='form-group required'>

                                <label class='control-label'>First Name</label> <input

                                class='form-control'  name="first_name" value="{{ Auth::user()->name }}" type='text'>

                            </div>

                        </div>



                        <div class='col-md-6'>

                            <div class=' form-group required'>

                                <label class='control-label'>Last Name</label> <input

                                class='form-control' name="last_name"   type='text'>

                            </div>

                        </div>


                        <div class='col-md-6'>

                            <div class=' form-group required'>

                                <label class='control-label'>Address</label> <input

                                class='form-control'  name="address" type='text'>

                            </div>

                        </div>


                        <div class='col-md-6'>

                            <div class=' form-group required'>

                                <label class='control-label'>City</label> <input

                                class='form-control'  name="city" type='text'>

                            </div>

                        </div>



                        <div class='col-md-6'>

                            <div class=' form-group required'>

                                <label class='control-label'>State</label> <input

                                class='form-control' name="state" type='text'>

                            </div>

                        </div>



                        <div class='col-md-6'>

                            <div class=' form-group required'>

                                <label class='control-label'>Zip Code</label> <input

                                class='form-control'  name="zip_code" type='text'>

                            </div>

                        </div>



                        <div class='col-md-6'>

                            <div class=' form-group required'>

                                <label class='control-label'>Email</label> <input

                                class='form-control' name="email" value="{{ Auth::user()->email }}" type='text'>

                            </div>

                        </div>


                        <div class='col-md-6'>

                            <div class=' form-group required'>

                                <label class='control-label'>Amount</label> <input

                                class='form-control'  name="amount" value="{{ old('amount') }}" type='text'>

                            </div>

                        </div>


                        <div class='col-md-6'>

                            <div class=' form-group required'>

                                <label class='control-label'>Currency</label> <input

                                class='form-control'  name="currency" value="INR" type='text' readonly>

                            </div>

                        </div>



                        <div class='col-md-12'>

                            <div class=' form-group required'>

                             <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>

                         </div>

                     </div>



                 </form>

             </div>

         </div>        

     </div>

 </div>



</div>




@endsection
