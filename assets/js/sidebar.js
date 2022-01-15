document.addEventListener("DOMContentLoaded", function(event) {


    /*===== LINK ACTIVE =====*/

    const currentLocation = location.href;
            const menuItem = document.querySelectorAll('a');
            const menuLength = menuItem.length
            for (let i = 0; i < menuLength; i++) {
                if (menuItem[i].href === currentLocation) {
                    menuItem[i].classList.add('active')
                }

            }
    // Your code to run since DOM is loaded and ready



            
    });