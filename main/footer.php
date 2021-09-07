<?php

/* Javascript Section */
print('
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
');

/* Print main layout for footer */
print('
            <footer>
                <div class="container">
                    <div class="footer-top">
                        Owasp Secure &copy; 2021
                    </div>
                    <div class="footer-bottom">
                        <a href="">Solehin Bahadun</a>
                    </div>
                </div>
            </footer>
        </body>
    </html>
');

