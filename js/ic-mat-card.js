// Set click listeners
Array
    .from(document.querySelectorAll('.ic-mat-card-container'))
    .forEach(cont => {
        if (cont.dataset.href) {
            cont.addEventListener('click', () => {
                document.location = cont.dataset.href;
            });
        }
    });

// Set resize listeners
Array
    .from(document.querySelectorAll('.ic-mat-card-image'))
    .forEach(img => {
        const sizes = JSON.parse(img.dataset.sizes);
        const layout = img.dataset.layout;
        const handleResize = () => {
            let matchedSize = sizes[0];
            if (window.matchMedia("(max-width: 479px)")) {
                matchedSize = sizes[3];
            } else if (window.matchMedia("(max-width: 767px)")) {
                matchedSize = sizes[2];
            } else if (window.matchMedia("(max-width: 989px)")) {
                matchedSize = sizes[1];
            }
            if (layout === 'landscape') {
                img.style.width = matchedSize + "%";
            } else {
                img.style.height = matchedSize + "%";
            }
        }
        handleResize();
        window.addEventListener('resize', handleResize);
    });