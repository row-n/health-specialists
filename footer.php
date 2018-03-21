      <aside id="sidebar" class="sidebar">
        <?php get_sidebar(); ?>
      </aside>

      <footer id="footer" class="footer">
        <p>&copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?></p>
      </footer>

      <button class="scroll-to-top" id="scroll-to-top">
        <svg role="img" class="icon icon--chevron icon--sm" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 2q0.422 0 0.711 0.289l7 7q0.289 0.289 0.289 0.711 0 0.43-0.285 0.715t-0.715 0.285q-0.422 0-0.711-0.289l-5.289-5.297v15.586q0 0.414-0.293 0.707t-0.707 0.293-0.707-0.293-0.293-0.707v-15.586l-5.289 5.297q-0.289 0.289-0.711 0.289-0.43 0-0.715-0.285t-0.285-0.715q0-0.422 0.289-0.711l7-7q0.289-0.289 0.711-0.289z"></path>
        </svg>
      </button>

    </main>

    <?php wp_footer(); ?>

</body>
</html>
