<script >
      var msg= getParameterByName('msg');
      switch(msg){
            case 'bien':
               UIkit.notification({
               message: '<div class="alert alert-success" role="alert">Action Save</div>',
               status: 'primary',
               pos: 'bottom-left',
               timeout: 5000
                }); 
            break;
            case 'mal';
                UIkit.notification({
    message: '<div class="alert alert-danger" role="alert">Error</div>',
    status: 'warning',
    pos: 'bottom-left',
    timeout: 5000
     });
            break;
            case '';
            break;
      }
      
  

    function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
</script>