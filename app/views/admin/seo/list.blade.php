@section('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
      $('#typeSelect').change(function(){
        $('#selectForm').submit(); 
      });
    });
  </script>
@stop

@section('content')
<div class="row">
  {{ Form::open(array('url'=>'admin/seo','method'=>'get','id'=>'selectForm','class'=>'form-horizontal'))}}
  <div class="col-md-6">
    <h2>
      SEO
    </h2>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <p>
    {{ Form::select('type', Config::get('config.seo_mapping'), $type, array('id'=> 'typeSelect' ,'class'=> 'form-control'))}}
    </p>
  </div>
  {{ Form::close()}}
</div>
<div class="row">
  <div class="col-md-12">
      <table class="table table-hover table-bordered table-striped" style="margin-left:0">
        <thead>
          <tr>
            <th>Name</th>
            <th>SEO Title</th>
            <th>SEO Description</th>
            <th>SEO Keywords</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($list as $item)

          <tr>
            <td>{{ $item->name }}</td>
            @if($seo = $item->seo->first())
              <td>{{$seo->title}}</td>
              <td>{{$seo->description}}</td>
              <td>{{$seo->keywords}}</td>
              <td><a href="{{ url('admin/seo/'.$seo->id.'/edit?type='.$type.'&id='.$item->id)}}">Edit</a> </td>
            @else
              <td></td>
              <td></td>
              <td></td>
              <td>
                <a href="{{ url('admin/seo/create?type='.$type.'&id='.$item->id)}}">Add</a> 
              </td>
            @endif 
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>
</div>
@stop
