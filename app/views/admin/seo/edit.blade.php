@section('scripts')
  <script type="text/javascript" src="{{ asset('js/jquery.charcounter.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#title").charCounter(70,{
        container: '<small></small>'
      });

      $("#description").charCounter(160,{
        container: '<small></small>'
      });

      $("#keywords").charCounter(255,{
        container: '<small></small>'
      });

      $('#typeSelect').change(function(){
        $('#selectForm').submit(); 
      });
    });
    </script>
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    @if(Session::has('seo_created'))
      <div class="alert alert-success text-center">
        <h5>The SEO data has been created!</h5>
      </div>
    @endif

    @if(Session::has('seo_updated'))
      <div class="alert alert-success text-center">
        <h5>The SEO data has been updated!</h5>
      </div>
    @endif
  </div>
</div>

<div class="row">
  <div class="col-md-4">
  {{ Form::open(array('url'=>'admin/seo','method'=>'get','id'=>'selectForm','class'=>'form-vertical'))}}
    {{ Form::select('type', Config::get('config.seo_mapping'), $type, array('id'=> 'typeSelect' ,'class'=> 'form-control'))}}
  {{ Form::close()}}
  </div>
  <div class="col-md-8">
    <a href="{{ url('admin/seo?type='.$type)}}" class="btn btn-default">Back to the list</a>
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-8">
    @if(isset($seo))
      {{ Form::model($seo, array('url' => 'admin/seo/'.$seo->id, 'method' => 'put')) }}
    @else
      {{ Form::open(array('url' => 'admin/seo')) }}
    @endif
     
      <legend>Editing SEO for <strong>{{ $item->name }}</strong> in {{ Config::get('config.seo_mapping.'.$type) }}</legend>
      
      <div class="form-group">
        {{Form::label('title')}}  
        {{ Form::text('title', null ,array('class'=>'form-control', 'placeholder'=>'SEO Title'))}}
      </div>

      <div class="form-group">
        {{ Form::label('keywords')}}  
        {{ Form::text('keywords', null ,array('class'=>'form-control', 'placeholder'=>'SEO Keywords'))}}
      </div>
      
      <div class="form-group">
        {{ Form::label('description')}}  
        {{ Form::textarea('description', null ,array('class'=>'form-control', 'placeholder'=>'SEO Description','rows' => 4))}}
      </div>

      {{ Form::hidden('type', $type)}}
      {{ Form::hidden('id', $item->id)}}

      <div class="form-group">
        {{ Form::submit('Submit', array('class'=>'btn btn-default'))}}
      </div>

      {{ Form::close()}}
  </div>
</div>
@stop
