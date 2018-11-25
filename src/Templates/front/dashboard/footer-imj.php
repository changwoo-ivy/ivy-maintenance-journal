<?php
/**
 * Context:
 * @var callable|null $footer_func
 */
if (!isset($footer_func)) {
    $footer_func = null;
}
?>
</div> <!-- .full-container or .container-fluid -->
</div> <!-- #mainContent -->
</main>

<!-- ### $App Screen Footer ### -->
<footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
  <span>Copyright © 2017 Designed by <a href="https://colorlib.com" target='_blank' title="Colorlib">Colorlib</a>. All rights reserved.</span>
</footer>
</div>
</div>
<?php if ($footer_func) {
    $footer_func();
}; ?>
</body>
</html>
