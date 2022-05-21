<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <script type="text/javascript">
            var showAllGTLanguages=<?php echo  $showAllGTLanguages; ?>;
            var listOfGTLanguage="<?php echo $showGTLanguages ?>";
            function googleTranslateElementInit() {
                if(showAllGTLanguages){
                    new google.translate.TranslateElement({}, 'google_translate_element');
                }else{
                    new google.translate.TranslateElement({includedLanguages:listOfGTLanguage}, 'google_translate_element');
                }
            }
        </script>