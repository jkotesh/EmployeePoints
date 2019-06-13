<html>
    <head>
        <title>{{env('PROJECT_NAME')}}</title>
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                text-align: center;
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
            tbody {
                counter-reset: rowNumber;
            }

            tbody tr {
                counter-increment: rowNumber;
            }

            tbody tr td:first-child::before {
                content: counter(rowNumber);
                min-width: 1em;
                margin-right: 0.5em;
            }
        </style>
    </head>
    <body>
        <?php 
                $MAIN_PATH = env('ADMIN_URL');
         ?>
        <div style="width:600px;margin: 0px auto;background: white;border-bottom: 1px solid rgb(204, 204, 204);box-shadow: 0 1px 5px rgb(185, 185, 185);padding:10px 25px;">            
            <div style="border-bottom: 2px solid gray;">
                <a href="<?php echo $MAIN_PATH; ?>" target="_blank"></a>
                <span style="text-align: center;width: 400px;margin-top: 40px;font-size: 30px;"><b><img style="padding-bottom: 5px;float:left;width:100px;margin-left: 227px;" src="https://www.samuhacreations.com/images/logo1.png" alt="{{env('APP_NAME')}}" class="header_logo"/></b></span>
                <div style="clear:both;">&nbsp;</div>
            </div>       
            <div style="width:500px;margin: 0px auto;background-color: white;padding: 0px 25px 25px 25px;line-height: 1.7em;">
                <h3 style="color:#2772c0;">Dear {{$name}},</h3>
                <p>URL:{{$MAIN_PATH}}</p>
                <p>Email : {{$email}}</p>
                <p>Password : <b>{{$password}}</b></p>
            </div>
        </div>        
    </body>
</html>