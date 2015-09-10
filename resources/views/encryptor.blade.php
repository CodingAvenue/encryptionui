@extends('template')
@section('content')
            <div class="col-lg-12">                    
                <form class="form-inline" role="form">
                   <div class="form-group">
                       <label for="exampleInputEmail2">Secret Passphrase</label>
                       <input type="text" class="form-control" id="secret_passphrase" placeholder="Secret Passphrase">
                       <button onclick="return encryptFunction()" class="btn btn-primary">ENCRYPT</button>
                       <button onclick="return decryptFunction()" class="btn btn-warning">DECRYPT</button>
                       <button disabled class="btn btn-success" id='copy_trigger' >COPY URL</button>
                   </div>
                </form>     
                <div class="row" style="margin-top:10px;">
                    <div class="col-md-12">
                        <div class='well' id='url_result'>
                            <div id='long_url' style='word-break:break-all'>
                                <b>URL: </b><span id='long_url_origins'></span>
                            </div>
                        </div>
                        <p>Text to encrypt/decrypt:</p>
                        <textarea style="padding:10px; width:100%; height:200px;" id="result">{{ $encrypted_data }}</textarea>
                    </div>
                </div>
            </div>
            <script type='text/javascript'>
                var base_url = "{{ url() }}/";
                var user_email = "{{ $data['email'] }}";
                var zclip_swf = "{{asset('/javascript/ZeroClipboard.swf')}}";
            </script>
@endsection
