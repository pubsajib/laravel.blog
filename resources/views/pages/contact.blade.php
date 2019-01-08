@extends('main')
@section('title','contact')
@section('content')
    <div class="row">
        <div class="col-md-12"><h1>Contact Me</h1> <hr></div>
        <div class="col-md-6">
            <form action="{{ url('contact') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label name="email">Email:</label>
                    <input id="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label name="subject">Subject:</label>
                    <input id="subject" name="subject" class="form-control">
                </div>

                <div class="form-group">
                    <label name="message">Message:</label>
                    <textarea id="message" name="message" class="form-control">Type your message here...</textarea>
                </div>
                <input type="submit" value="Send Message" class="btn btn-success">
            </form>
        </div>
        <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.3280951562974!2d90.3665091144569!3d23.80692939253257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0d6f6b8c2ff%3A0x3b138861ee9c8c30!2sMirpur+10+Roundabout%2C+Dhaka+1216!5e0!3m2!1sen!2sbd!4v1546930248946" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
@endsection