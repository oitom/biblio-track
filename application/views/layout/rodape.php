  <footer>
    <p>Biblio Track - 2023 - Design & Develpment by <a href="https://github.com/oitom" target="_blank">@oitom</a></p>
  </footer>
  
  <script>
   $(document).ready(function() {
      var footer = $('footer');
      var lastScrollTop = 0;

      $(window).scroll(function(event) {
        var st = $(this).scrollTop();

        if (st > lastScrollTop) {
          footer.css('bottom', '-60px');
        } else {
          footer.css('bottom', '0');
        }

        lastScrollTop = st;
      });
    });
  </script>
</body>
</html>