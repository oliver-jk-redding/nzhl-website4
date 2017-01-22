<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package some_like_it_neat
 */
?>
<?php tha_content_bottom(); ?>
</main><!-- #main -->
<?php tha_content_after(); ?>
<?php tha_footer_before(); ?>
<footer class="site-footer">
  <div class="footer-container">

    <ul>
      <li><a href="mailto:hobbitleague@gmail.com" target="_top">Contact</a></li>
      <li><a href="https://www.facebook.com/groups/826723854039078/" target="_blank">Facebook</a></li>
    </ul>

  	<p>&copy; The New Zealand Hobbit League</p>

  </div>
</footer>
<?php tha_footer_after(); ?>
</div><!-- .wrap -->
</div><!-- #page -->

<?php tha_body_bottom(); ?>
<?php wp_footer(); ?>
</body>
</html>