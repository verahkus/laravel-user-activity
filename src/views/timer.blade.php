
<script type="text/javascript">
  var idleTimer = null,
    timerALL = null,
    timerReloadALL = null,
    idleState = false, // состояние отсутствия
    idleWait = '{{config('user-activity.idleWait')}}', // время ожидания в мс. (1/1000 секунды)
    timerAjax = '{{config('user-activity.timerAjax')}}';

  reload();
  $(document).bind('mousemove keydown scroll', function(){
    clearTimeout(idleTimer);
    clearTimeout(timerALL);
    // Действия на возвращение пользователя
    if(idleState == true){
      setReload();
    }

    idleState = false;
    idleTimer = setTimeout(function(){
      clearTimeout(timerReloadALL);
      // Действия на отсутствие пользователя
      idleState = true;
      reload();

    }, idleWait);
  });

  function reload() {
    timerALL = window.setTimeout(function () {
      $.ajax({
        url: '{{route('user-last-activity')}}',
        method: 'POST',
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        success: function(res)
        {
          if (res.logout) {
            location.href='{{route('user-logout-page')}}'
          }
        },
        error: function(msg)
        {
          alert('error route user-last-activity');
        }
      });
      reload();
    }, timerAjax);
  }
  function setReload() {
    timerReloadALL = window.setTimeout(function () {
      $.ajax({
        url: '{{route('user-set-activity')}}',
        method: 'POST',
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        success: function(res)
        {},
        error: function(msg)
        {
          alert('error route user-set-activity');
        }
      });
      setReload();
    }, timerAjax);
  }
</script>
