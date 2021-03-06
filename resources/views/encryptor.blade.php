@extends('template')
@section('content')
        <style>
            .spinner {
                width: 100px;
            }
            .spinner input {
                text-align: right;
            }
            .input-group-btn-vertical {
                position: relative;
                white-space: nowrap;
                width: 1%;
                vertical-align: middle;
                display: table-cell;
            }
            .input-group-btn-vertical > .btn {
                display: block;
                float: none;
                width: 100%;
                max-width: 100%;
                padding: 8px;
                margin-left: -1px;
                position: relative;
                border-radius: 0;
            }
            .input-group-btn-vertical > .btn:first-child {
                border-top-right-radius: 4px;
            }
            .input-group-btn-vertical > .btn:last-child {
                margin-top: -2px;
                border-bottom-right-radius: 4px;
            }
            .input-group-btn-vertical i{
                position: absolute;
                top: 0;
                left: 4px;
            }
        </style>
            <div class="col-lg-12">                    
                <form class="form-inline" role="form">
                   <div class="form-group">
                       <label for="exampleInputEmail2">Secret Passphrase</label>
                       <input type="text" class="form-control" id="secret_passphrase" placeholder="Secret Passphrase">
                       <button id ="encrypt_button" onclick="return encryptFunction()" class="btn btn-primary">ENCRYPT</button>
                       <button onclick="return decryptFunction()" class="btn btn-warning">DECRYPT</button>
                       <button disabled onclick="return false" class="btn btn-success" id='copy_trigger' >COPY URL</button>
                       <br />
                       <br />
                       <b>Expiration</b>
                       <div class="input-group spinner">
                           <input type="text" class="form-control" id="expiration" value="2">
                           <div class="input-group-btn-vertical">
                               <button class="btn btn-default" type="button"><i class="fa">+</i></button>
                               <button class="btn btn-default" type="button"><i class="fa">-</i></button>
                           </div>
                        </div> day(s)
                   </div>
                </form>     
                <div class="row" style="margin-top:10px;">
                    <div class="col-md-12">
                        <div id='loader' style='display:none'><br /><center><img src="{{ asset('/images/Preloader.gif') }}" /><br />Just a sec...</center></div>
                        <div class='well' id='url_result' style='display:none'>
                            <div id='long_url' style='word-break:break-all'>
                                <b>URL: </b><span id='long_url_origins'></span>
                            </div>
                        </div>
                        <p>Text to encrypt/decrypt:</p>
                        <textarea style="padding:10px; width:100%; height:200px;" id="result">{{ $encrypted_data }}</textarea>
                    </div>
                </div>
            </div>
            <div class='clearfix'></div>
            <br />
            <div class='well'>
                <b>Instructions</b>
                <ul>
                    <li>This tool is only usable by Illuminate Education and Coding Avenue employees. Don't use it to send encrypted messages to clients, customers, or other non-employees.</li>
                    <li>Pick a good passphrase and share it with your team. Do not write it down, do not email it, do not share it. Disclose it in a safe location and remember it.</li>
                    <li>To encrypt messages, use that password and send the generated URL to its intended recipients.</li>
                    <li>To decrypt messages, visit the URL shared with you and use your team password.</li>
                </ul>
            </div>
            <script type='text/javascript'>
                var base_url = "{{ url() }}/";
                var user_email = "{{ $data['email'] }}";
                var zclip_swf = "{{asset('/javascript/ZeroClipboard.swf')}}";
            </script>
@endsection
