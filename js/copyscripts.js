// copy text in result 
        function copyReult(){
            var copyText = document.getElementById("file-qr-result");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
        }
        
       function copyReultCamera(){
            var copyText = document.getElementById("qrContent");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
             document.execCommand("copy");
       }
    // to show save tool 
            // $(document).ready(function() {
            //     if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
            //         // true for mobile device
            //     }else{
            //         // is web browser 
            //         var getTime = localStorage.getItem("qrcode");
            //         if (new Date().getTime() > getTime){
            //             var time = 1000 * 60 * 60 * 200;
            //             setTimeout(function() {
            //                 localStorage.setItem("qrcode", new Date().getTime()+time);
            //                 $('#saveTool').modal();
            //             }, 20000);
            //         }
            //     }   
            // });

            $(document).ready(function() {
                if (window.location.href.indexOf("scan-qr-code") > -1) {
                    document.getElementById("scan").classList.add("activeTab");
                }
            });

           $("#flip").click(function(){ 
             $("#panel").slideToggle("slow");
           });