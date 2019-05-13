  @extends('main')
  @section('title', ' | Contact')
  @section('content')
  <div class="row">
   <div class="col-md-12">
     <h1>Contact</h1>
     <hr>
     <form action="{{ url('feedback') }}">
        {{ csrf_field() }}
       <div class="form-group">
         <label name="email">Email:</label>
         <input type="text" id="email" name="email" class="form-control">
       </div>
       <div class="form-group">
         <label name="subject">Subject:</label>
         <input type="text" id="subject" name="subject" class="form-control">
       </div>
       <div class="form-group">
         <label name="text">Text:</label>
         <textarea id="text" name="text" class="form-control">
          Type your message...
        </textarea>
      </div>
      <input type="submit" value="Send Message" class="btn btn-success">
    </form>
  </div>
</div>
@endsection
