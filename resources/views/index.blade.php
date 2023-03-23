<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checking Service</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
<body>
    <div class="row">
        <div class="col-md-8 offset-md-1">
            <div class="row mt-3">
                <div class="col-md-8">
                    <input type="email" class="form-control" name="email" id="ltrInput" placeholder="name@example.com" autocorrect="off" spellcheck="false" autocomplete="off" required="">
                </div>
                <div class="col-md-2">
                    <button type="submit" onclick="email_checker()" class="btn btn-primary">Check</button>
                </div>
            </div>

        </div>

    </div>
    {{-- <div class="row mt-3">
        <div class="col-md-8">
            <input type="phone" class="form-control" name="phone" id="phoneInput" placeholder="0164-575826" autocorrect="off" spellcheck="false" autocomplete="off" required="">
        </div>
        <div class="col-md-3">
            <button type="submit" onclick="phone_checker()" class="btn btn-primary">Check</button>
        </div>
    </div> --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function email_checker(){
            
            var email = $("#ltrInput").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var emailRegex = /^([a-zA-Z0-9_.+-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;

            

            if(emailRegex.test(email) == false){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            }else{
                $.ajax({
                    type: "GET",
                    url: "{{route('customer_email_checker')}}",
                    data: {
                        email:email
                    },
                    success: function (response) {
                        console.log(response);
                        
                    }
                });
            }



        }
    </script>
</body>
</html>