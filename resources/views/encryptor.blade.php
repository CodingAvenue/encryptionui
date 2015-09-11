@extends('template')
@section('content')
            <div class="col-lg-12">                    
                <form class="form-inline" role="form">
                   <div class="form-group">
                       <label for="exampleInputEmail2">Secret Passphrase</label>
                       <input type="text" class="form-control" id="secret_passphrase" placeholder="Secret Passphrase">
                       <button onclick="return encryptFunction()" class="btn btn-primary">ENCRYPT</button>
                       <button onclick="return decryptFunction()" class="btn btn-warning"><i class="icon-unlock"></i> DECRYPT</button>
                   </div>
                </form>     
                <div class="row" style="margin-top:10px;">
                    <div class="col-md-12">
                        <p>Text to encrypt/decrypt:</p>
                        <textarea style="padding:10px; width:100%; height:200px;" id="result"></textarea>
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
@endsection
