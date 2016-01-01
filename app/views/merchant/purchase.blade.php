@extends('layouts.default')

@section('content')
<!-- Heading Row -->
        <div class="row">
            <div class="col s4 "></div>
            <!-- /.col-md-8 -->
            <div class="col s12 m4 well offset-l4">
                <div class="center-align">
                    <img class="responsive-img" src="{{URL::to('public/images')}}/hybopay_checkout.png" alt="HyboPay Logo" style="height:150px;width:200px"/>
                </div>
                <h3 id="pad" class="center"> How do you wish to Pay?</h3>
                <div class="purchase">
                      <ul class="collection">
                        <li class="collection-item avatar">
                          <img src="{{URL::to('public/images')}}/paypa_icon.png" alt="" class="circle" />
                          <span class="title">PayPal</span>
                          <p>
                             Purchase this item with your paypal Account.
                          </p>
                          <a href="#!" class="secondary-content"><i class="material-icons">done_all</i></a>
                        </li>
                        <li class="collection-item avatar">
                          <img src="{{URL::to('public/images')}}/stp_icon.png" alt="" class="circle" />
                        
                          <span class="title">Solid Trust Pay</span>
                          <p>
                             Purchase this item with your Solid Trust Pay Account.
                          </p>
                          {{Form::open(array('url'=>'https://solidtrustpay.com/handle_accver.php', 'class'=>'form-horizontal dostpay', 'role'=>'form'))}}
                            <div id="stp">
                                <input type="hidden" name="merchantAccount" value="larryakah" />
                                <input type="hidden" name="apikey" value="{{Input::get('apikey')}}"/>
                                <input type="hidden" name="amount" value="{{Input::get('amount')}}"/>
                                <input type="hidden" name="currency" value="{{Input::get('currency')}}"/>
                                <input type="hidden" name="item_id" value="HyboPay purchase with Solid Trust Pay" />
                                <input type="hidden" name="confirm_url" value="{{URL::route('dashboard')}}/stpconfirm" />
                                <input type="hidden" name="testmode" value="on" />
                                <input type="hidden" name="notify_url" value="{{URL::route('sandbox/api/merchantapi/confirmstppurchase')}}" />
                                <input type="hidden" name="return_url" value="{{URL::route('sandbox/api/merchantapi/confirmstppurchase')}}" />
                                <input type="hidden" name="cancel_url" value="{{URL::route('sandbox/api/merchantapi/cancelstppurchase')}}" />
                                <input type="hidden" name="user1" value="{{Input::get('return_url')}}"/> <!-- receiver email, number etc set by js -->
                                <input type="hidden" name="user2" value="xx"/><!-- receiver's payment provider -->
                            </div>
                          <a href="#!" class="secondary-content stpay" ><i class="material-icons">done_all</i></a>
                          {{Form::token()}}
                        {{Form::close()}}
                        </li>
                        <li class="collection-item avatar">
                          <img src="{{URL::to('public/images')}}/mtnmomo.jpg" alt="" class="circle" />
                          <span class="title">MobileMoney</span>
                          <p>
                             Purchase this item with your Mobile Money Account.
                          </p>
                          <a href="#!" class="secondary-content"><i class="material-icons">done_all</i></a>
                        </li>
                      </ul>
                      <p class="teal-text">More coming up soon!</p>
                </div>
            </div>
            <div class="col s4"></div>
            <!-- /.col-md-4 -->
        </div>
@stop
