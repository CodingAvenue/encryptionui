<!DOCTYPE html>
<html>
    <head>
        <title>Encryption tool</title>
        <link rel='stylesheet' type='text/css' href="{{ asset('/css/bootstrap.min.css') }}" />
        <style>
            body {
                width:850px;
                margin-left:auto;
                margin-right:auto;
                margin-top:20px;
            }
        </style>
    </head>
    <body>
        <h3>Encryption Tool</h3>
        <hr/>
        <div class="row">    
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
        </div>
    </body>
    <script type='text/javascript' src="{{ asset('/javascript/aes.js')}}"></script>
    <script type='text/javascript' src="{{ asset('/javascript/encrypt.js') }}"></script>
</html>
