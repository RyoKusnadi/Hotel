@extends('layouts.home')

@section('title')
    WELCOME | RKStory Hotel
@endsection 

@section('content')
<div class="hero-wrap js-fullheight" style="background-image: url('../assets/img/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate">
            <h2 class="subheading">Welcome to RKSTORY HOTEL</h2>
            <h1 class="mb-4">Use Our Facility To Have An Unforgettable Expericence</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
      <div class="container">
          <div class="row justify-content-end">
              <div class="col-lg-4">
                  <form action="/confirmClients" method="POST"class="appointment-form">
                      {{csrf_field()}}
                          <h3 class="mb-3">Book your Room</h3>
                          <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                    <select required class="selectpicker form-control" data-live-search="true" name="roomtype_id">
                                        <option value="" disabled selected>Room Type </option>
                                        @foreach ($roomtypes as $roomtype)
                                            <option data-subtext="{{ $roomtype->name }}" value="{{ $roomtype->id }}">{{ $roomtype->name }}</option> 
                                        @endforeach
                                    </select>
                                </div>
                              </div>  
                              <div class="col-md-6">
                                  <div class="form-group">
                                          <input required type="date" name="check_in" class="form-control" placeholder="Check-In">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  
                                  <div class="form-group">
                                          <input required type="date" name="check_out" class="form-control" placeholder="Check-Out">
                                  </div>
                              </div>
                              <div class="col-md-12">
                                  <div class="form-group">
                                  <input type="submit" value="Book Now" class="btn btn-primary py-3 px-4">
                             </div>
                             </div>
                          </div>
                  </form>
              </div>
          </div>
      </div>
  </section>
 
  <section class="ftco-section ftco-services">
      <div class="container">
          <div class="row">
        <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
          <div class="d-block services-wrap text-center">
            <div class="img" style="background-image: url(../assets/img/services-1.jpg);"></div>
            <div class="media-body py-4 px-3">
              <h3 class="heading">Strategic Location</h3>
              <p>Our Hotel Is In The Center of the Downtown</p>
            </div>
          </div>      
        </div>
        <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
          <div class="d-block services-wrap text-center">
            <div class="img" style="background-image: url(../assets/img/services-2.jpg);"></div>
            <div class="media-body py-4 px-3">
              <h3 class="heading">Proffesional Services</h3>
              <p>Our Employee Already Trained With International Standard</p>
            </div>
          </div>    
        </div>
        <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
          <div class="d-block services-wrap text-center">
            <div class="img" style="background-image: url(../assets/img/services-3.jpg);"></div>
            <div class="media-body py-4 px-3">
              <h3 class="heading">Great Experience</h3>
              <p>With Our Facility , We Believe you will have a great experience in here!</p>
            </div>
          </div>      
        </div>
      </div>
      </div>
  </section>
  
  <section class="ftco-section bg-light">

          <div class="container-fluid px-md-0">
              <div class="row no-gutters justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2>Our Room</h2>
                </div>
              </div>
             <div class="row no-gutters">
                 @foreach($rooms as $room)
                  <div class="col-lg-6" >
                      <div class="room-wrap d-md-flex" >
                          <a  class="img order-md-last" style="background-image: url(uploads/{{$room->roomPicture}});"></a>
                          <div class="half right-arrow d-flex align-items-center">
                              <div class="text p-4 p-xl-5 text-center">
                                  <p class="star mb-0"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></p>
                                  <p class="mb-0"><span class="price mr-1">Rp.{{number_format($room->roomTypes['price'], 0,',', '.')}}</span> <span class="per">per night</span></p>
                                  <h3 class="mb-3"><a href="rooms.html">{{$room->roomTypes['name']}}</a></h3>
                                  <ul class="list-accomodation">
                                      <li><span>Max:</span> {{$room->maxCapacity}} Persons</li>
                                      <li><span>Bed:</span> {{$room->beds}}</li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
                 @endforeach
             </div>
          
          <footer class="footer" style="float: left; padding:0px; margin:0; ">
            <p style="float: left"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            <p style="float: right; margin-right:10px" >Made by : Ryo Kusnadi
                <a style="margin:0; padding:0" href="https://www.linkedin.com/in/ryo-kusnadi/" target="_blank">|
                  <img src="../../../../../../../assets/img/linkedin.png" width="15" height="15" alt="Ryo's Linked In" title="Ryo's Linked In"> | 
                </a>
                <a style="margin:0; padding:0" href="https://github.com/RyoKusnadi" target="_blank">
                  <img src="../../../../../../../assets/img/Github.png" width="15" height="15" alt="Ryo's Github" title="Ryo's Github">
                </a>
            </p>
        </footer>
      </section>
      @endsection
@section('scripts')
    
@endsection