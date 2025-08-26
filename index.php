<?php
$credits = file_get_contents('credits.txt');
$credits;
?>

<!DOCTYPE html>
<html tracking="true">
<head>
    <title>💳 𝕽𝖆𝖘 𝕮𝕮 𝕮𝖍𝖊𝖈𝖐𝖊𝖗 💳</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/css/mdb.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            background-color: #144d6b;
            color: white;
        }

        .card {
            background-color: #F0FFF0;
        }

        .status-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            max-width: 300px;
            margin: 20px auto;
            background-color: #F0FFF0;
            border-radius: 8px;
            padding: 15px;
            color: #333;
        }
        .status-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: rgba(20,77,101,1);
            border-radius: 5px;
        }
        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
        }
        .badge-success {
            background-color: #28a745;
        }
        .badge-danger {
            background-color: #dc3545;
        }
        .badge-info {
            background-color: #17a2b8;
        }
        .badge-dark {
            background-color: #343a40;
        }
        #limitModal, #noCreditsModal, #noCardsModal {
            color: #000;
        }
    </style>
</head>

<body>
    <!-- Limit Warning Modal -->
    <div class="modal fade" id="limitModal" tabindex="-1" role="dialog" aria-labelledby="limitModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h5 class="modal-title" id="limitModalLabel">⚠️<b> Limit Exceeded </b>⚠️</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>You can only test up to 200 cards at a time.</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- No Credits Modal -->
    <div class="modal fade" id="noCreditsModal" tabindex="-1" role="dialog" aria-labelledby="noCreditsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h5 class="modal-title" id="noCreditsModalLabel">⚠️<b> No Credits Available </b>⚠️</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Contact</b> <a href="https://t.me/rashunter44" target="_blank"><b>@RasHunter</b> </a> <b>For your credits Top-up!</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- No Cards Modal -->
    <div class="modal fade" id="noCardsModal" tabindex="-1" role="dialog" aria-labelledby="noCardsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h5 class="modal-title" id="noCardsLabel">⚠️<b> No Cards Inserted </b>⚠️</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Insert Not More Than 200 Cards!</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="row col-md-12">
        <div class="card col-sm-8 mx-auto">
            <h5 class="card-body h6"><span class="text text-dark">💳 𝕽𝖆𝖘 𝕮𝕮 𝕮𝖍𝖊𝖈𝖐𝖊𝖗 💳</h5>
            <div class="card-body">
                <div class="md-form">
                    <div class="col-md-12">
                        <textarea type="text" style="text-align: center;" id="lista" class="md-textarea form-control" rows="2"></textarea>
                        <label for="lista">Drop CC Here 👇 Up - 200 Cards Limit</label>
                    </div>
                </div>
                <center>
                    <button class="btn btn-success waves-effect waves-light" style="width: 150px; outline: none;" id="testar" onclick="enviar()">TEST</button>
                    <button class="btn btn-danger waves-effect waves-light" style="width: 150px; outline: none;" id="stop" onclick="stopTesting()">STOP</button>
                    <button class="btn btn-warning waves-effect waves-light" style="width: 150px; outline: none;" onclick="$('#noCreditsModal').modal('show');">Buy Credits</button>
                </center>
            </div>
        </div>
        <div class="card status-container">
            <div class="status-item">
                <span><span class="text text-white">Approved</span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="cLive" class="badge badge-success">0</span>
            </div>
            <div class="status-item">
                <span><span class="text text-white">Declined</span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="cDie" class="badge badge-danger">0</span>
            </div>
            <div class="status-item">
                <span><span class="text text-white">Tested</span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="total" class="badge badge-info">0</span>
            </div>
            <div class="status-item">
                <span><span class="text text-white">Loaded</span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="carregadas" class="text text-white"><b>0</b></span>
            </div>    
            <div class="status-item">
                <span><span class="text text-white">Credits</span>
                &nbsp;&nbsp;</span><span class="text text-warning"><b>Trial</b></span>&nbsp;&nbsp;<span id="credits-value" class="text text-warning"><?php echo $credits; ?></span>      
            </div>
        </div>
    </div>

    <br>
    <br>
    
    <div class="row col-md-12">
        <div class="card col-sm-11 mx-auto" style="width: 80%;">
            <div style="position: absolute; top: 0; right: 0;">
                <button id="mostra" class="btn btn-success waves-effect waves-light">SHOW/HIDE</button>
            </div>
            <div class="card-body">
                <h6 style="font-weight: bold;" class="card-title"><span class="text text-dark">APPROVED - <span id="cLive2" class="badge badge-success">0</span></h6>
                <div id="bode" style="display: none;"><span id=".aprovadas" class="aprovadas"></span></div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <div class="row col-md-12">
        <div class="card col-sm-11 mx-auto" style="width: 80%;">
            <div style="position: absolute; top: 0; right: 0;">
                <button id="mostra2" class="btn btn-danger waves-effect waves-light">SHOW/HIDE</button>
            </div>
            <div class="card-body">
                <h6 style="font-weight: bold;" class="card-title"><span class="text text-dark">DECLINED - <span id="cDie2" class="badge badge-danger">0</span></h6>
                <div id="bode2" style="display: none;"><span id=".reprovadas" class="reprovadas"></span></div>
            </div>
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/js/mdb.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#bode").hide();
            $('#mostra').click(function() {
                $("#bode").slideToggle();
            });
        });

        $(document).ready(function() {
            $("#bode2").hide();
            $('#mostra2').click(function() {
                $("#bode2").slideToggle();
            });
            
            var isTesting = false;

            function stopTesting() {
                isTesting = false;
                console.log('Testing stopped');
            }
            
            // Create audio object for beep sound
            var beep = new Audio('../hangout.mp3');

            function updateCreditsDisplay() {
                $.ajax({
                    url: '../get_credits.php',
                    type: 'GET',
                    async: true,
                    success: function(response) {
                        console.log('Credits fetched:', response);
                        $('#credits-value').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                    }
                });
            }

            // Initial credits load
            $(document).ready(function() {
                updateCreditsDisplay();
            });

            window.enviar = function() { // Make enviar function globally accessible
                console.log('TEST button clicked'); // Debugging log
                // Check credits before processing
                $.ajax({
                    url: '../get_credits.php',
                    type: 'GET',
                    async: false,
                    success: function(response) {
                        var credits = parseInt(response);
                        console.log('Initial credits check:', credits);
                        if (isNaN(credits) || credits <= 0) {
                            $('#noCreditsModal').modal('show');
                            console.log('No credits available, showing modal');
                            return;
                        }

                        var linha = $("#lista").val();
                        var linhaenviar = linha.split("\n");
                        var total = linhaenviar.length;

                        // Check if there are no cards inserted
                        if (total === 0 || linha.trim() === "") {
                            $('#noCardsModal').modal('show'); // Show no cards modal
                            console.log('No cards inserted, showing modal');
                            return; // Exit the function
                        }

                        // Debugging log for total cards
                        console.log('Total cards:', total);

                        // Check card limit and show modal if exceeded
                        if (total > 200) {
                            $('#limitModal').modal('show'); // Ensure this line is executed
                            console.log('Card limit exceeded:', total);
                            return; // Exit the function after showing the modal
                        }

                        var ap = 0;
                        var rp = 0;
                        isTesting = true; // Start testing

                        linhaenviar.forEach(function(value, index) {
                            setTimeout(function() {
                                // Check credits before each card
                                $.ajax({
                                    url: '../get_credits.php',
                                    type: 'GET',
                                    async: false,
                                    success: function(creditResponse) {
                                        var currentCredits = parseInt(creditResponse);
                                        console.log('Credits before card check:', currentCredits);
                                        if (isNaN(currentCredits) || currentCredits <= 0) {
                                            $('#noCreditsModal').modal('show');
                                            console.log('No credits during loop, stopping');
                                            isTesting = false; // Stop testing
                                            return; // Exit the function
                                        }

                                        $.ajax({
                                            url: '../api.php?lista=' + value,
                                            type: 'GET',
                                            async: true,
                                            success: function(resultado) {
                                                console.log('Card check result:', resultado);
                                                if (resultado.match("Aprovadas")) {
                                                    removelinha();
                                                    ap++;
                                                    aprovadas(resultado + "");
                                                    // Play beep sound for approved card
                                                    beep.play().catch(function(error) {
                                                        console.error('Error playing beep sound:', error);
                                                    });
                                                    // Deduct 1 credit for approved card
                                                    $.ajax({
                                                        url: '../deduct_credit.php',
                                                        type: 'POST',
                                                        async: true,
                                                        success: function() {
                                                            console.log('Credit deducted');
                                                            updateCreditsDisplay();
                                                        }
                                                    });
                                                } else {
                                                    removelinha();
                                                    rp++;
                                                    reprovadas(resultado + "");
                                                }
                                                $('#carregadas').html(total);
                                                var fila = parseInt(ap) + parseInt(rp);
                                                $('#cLive').html(ap);
                                                $('#cDie').html(rp);
                                                $('#total').html(fila);
                                                $('#cLive2').html(ap);
                                                $('#cDie2').html(rp);
                                            }, // Closing for success function of the card check
                                            error: function(xhr, status, error) {
                                                console.error('AJAX Error:', status, error);
                                            }
                                        }); // Closing for the AJAX call to check card
                                    } // Closing for success function of credit check
                                }); // Closing for the AJAX call to check credits before each card
                            }, 10000 * index);
                        }); // Closing for the forEach loop
                    } // Closing for success function of initial credits check
                }); // Closing for the AJAX call to check initial credits
            }

            function aprovadas(str) {
                $(".aprovadas").append(str + "<br>");
            }

            function reprovadas(str) {
                $(".reprovadas").append(str + "<br>");
            }

            function removelinha() {
                var lines = $("#lista").val().split('\n');
                lines.splice(0, 1);
                $("#lista").val(lines.join("\n"));
            }
        });
    </script>

    <div class="hiddendiv common"></div>
    <div class="hiddendiv common"></div>
    <br>
    <footer></footer>
</body>
</html>
