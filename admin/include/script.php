  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../js/jQuery.js"></script>
  <script src="../js/Popper.js"></script>
  <script src="../js/bootstrap.js"></script>

  <script>
      // Write Javascript code!
      const side_menu = document.getElementById("side-menu");

      [
          document.getElementById("menu-btn"),
          document.getElementById("overlay")
      ].forEach(el => {
          el.addEventListener("click", () => {
              if (side_menu.classList.contains("closed")) {
                  side_menu.classList.remove("closed");
              } else {
                  side_menu.classList.add("closed");
              }
          });
      });
    </script>