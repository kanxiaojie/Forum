@extends('layout')

@section('content')
    <div class="container" style="padding-top: 45px">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <select type="text" id="province_id" name="province_id" class="form-control">
                        @foreach($provinces as $id => $name)
                            <option value="{{ $id }}" @if($id == 0) selected @endif>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-2">
                <select type="text" id="city" name="city" class="form-control">
                    @foreach($cities as $id => $name)
                        <option value="{{ $id }}" @if($id == 0) selected @endif>{{ $name }}</option>
                    @endforeach
                </select>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $("#province_id").change(function(){
            var province_id = $('#province_id').val();
            $.ajaxSetup({
                headers:{'X-CSRF-TOKEN': '{{ csrf_token() }}'}
            });
            $.ajax({
                type:'POST',
                url:'/ajax/province',
                data: {province_id: province_id},
                dataType: 'json',
                success:function(data){
                    var strCity = '';
                    $.each(data, function(i){
                        strCity += '<option value="';
                        strCity += data[i].id;
                        strCity += '">';
                        strCity += data[i].name;
                        strCity += '</option>';
                    });
                    $('#city').html('');
                    $('#city').append(strCity);
                },
                error:function(xhr, type){
                    alert('错误!')
                }
            });
        });
    </script>
@endsection