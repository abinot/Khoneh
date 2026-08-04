// Global animateCount function for stats counter
window.animateCount = function(target, duration) {
    return function() {
        const start = performance.now();
        const animate = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            this.count = Math.floor(progress * target);
            if (progress < 1) requestAnimationFrame(animate);
        };
        requestAnimationFrame(animate);
    };
};
