<!DOCTYPE html>

@include('User.include.header')



<!-- Start All Title Box -->
{{-- <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Contact Us</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Contact Us </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
<!-- End All Title Box -->

<!-- Start Contact Us  -->
<div class="contact-box-main">
    <div class="container">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3734.848998395538!2d72.93901111539816!3d20.594223307844914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be0c34d9c46179b%3A0xeada3a937ae6fc89!2sIT%20Idol%20Technologies!5e0!3m2!1sen!2sin!4v1647327923097!5m2!1sen!2sin"
            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="contact-info-left">

                    @foreach ($footer as $foot)
                        <h2>CONTACT INFO</h2>

                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Address: {{ $foot->address }}</p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Phone: <a
                                        href="tel:+1-888705770">{{ $foot->phone }}</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a
                                        href="mailto:contactinfo@gmail.com">{{ $foot->email }}</a></p>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="contact-form-right">
                    <h2>GET IN TOUCH</h2>
                    @if (Session::has('status'))
                        <div class="alert alert-success text-center">
                            {{ Session::get('status') }}
                        </div>
                    @endif



                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        @if (Session::has('status'))
                            <div class="alert alert-success text-center">
                                {{ Session::get('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Your Name" required data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Your Email" id="email" class="form-control"
                                        name="email" required data-error="Please enter your email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="subject"
                                        placeholder="Subject" required data-error="Please enter your Subject">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="message" name="message" placeholder="Your Message" rows="4"
                                        data-error="Write your message" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="submit-button text-center">
                                    <button class="" id="submit" type="submit"
                                        style="color:black,background-color:black">Send Message</button>
                                    {{-- <div id="msgSubmit" class="h3 text-center"></div>
                                        <div class="clearfix"></div> --}}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Cart -->

<!-- Start Instagram Feed  -->

<!-- End Instagram Feed  -->


<!-- Start Footer  -->
@include('User.include.footer')
<!-- End Footer  -->
