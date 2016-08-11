<div class="main">
  <div class="pageSide">
    <ul>
      <?PHP
      if(!empty($subnavs))
        foreach ($subnavs as $key => $value) {
          echo '<li><a href="/welcome/page/'.$this->article->getIdFromNid($value['id']).'">'.$value['navname'].'</a></li>';
        }
      ?>
    </ul>
  </div>
  <div class="pageMain">
    <?php echo $article; ?>
    <!-- <iframe id="frame_content" src="/welcome/page/" scrolling="no" frameborder="0" onload="this.height=500" width="100%" name="iframe"></iframe> -->
    <!-- <script type="text/javascript">
      function reinitIframe() {
        var iframe = document.getElementById("frame_content");
        try {
          var bHeight = iframe.contentWindow.document.body.scrollHeight;
          var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
          var height = Math.max(bHeight, dHeight);
          iframe.height = height;
          console.log("aa");
        } catch (ex) {}
      }
      window.setInterval("reinitIframe()", 200);
    </script> -->
  </div>
</div>
<div class="footer">
    <div class="copyright">
        <h3>桂林电子科技大学-信息与通信学院 </h3>
        <h3>GUET</h3>
        <span>&copy; 2014</span>
    </div>
</div>
</div>

</body>
</html>
