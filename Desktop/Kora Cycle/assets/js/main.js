// Centralized site JS: mobile menu toggle, scroll fade-in observer, and small helpers
(function(){
  // Mobile menu toggle (nav uses #mobile-menu-button and #mobile-menu)
  const mobileMenuButton = document.getElementById('mobile-menu-button');
  const mobileMenu = document.getElementById('mobile-menu');
  if (mobileMenuButton && mobileMenu) {
    mobileMenuButton.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  }

  // IntersectionObserver for fade-in-up elements
  try {
    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { rootMargin: '0px 0px -100px 0px', threshold: 0.1 });

    document.querySelectorAll('.fade-in-up').forEach(el => observer.observe(el));
  } catch (err) {
    // IntersectionObserver not supported; reveal elements immediately
    document.querySelectorAll('.fade-in-up').forEach(el => el.classList.add('is-visible'));
  }

  // Calculator helper (if present on page) - safe guard
  window.kora = window.kora || {};
  window.kora.calculator = {
    // Attach to either 'calculator-form' or 'cycle-calculator-form' if present
    init: function() {
      const form = document.getElementById('calculator-form') || document.getElementById('cycle-calculator-form');
      if (!form) return;
      form.addEventListener('submit', function(e) {
        e.preventDefault();
        const lmpDateStr = document.getElementById('lmp-date') ? document.getElementById('lmp-date').value : '';
        const cycleLengthEl = document.getElementById('cycle-length') || document.getElementById('cycleLength');
        const cycleLength = cycleLengthEl ? parseInt(cycleLengthEl.value, 10) : NaN;
        const resultsArea = document.getElementById('results-area');
        const ovulationDisplay = document.getElementById('ovulation-date-display');
        const fertileWindowDisplay = document.getElementById('fertile-window-display');
        const errorBox = document.getElementById('error-message');
        if (errorBox) errorBox.classList.add('hidden'); if (resultsArea) resultsArea.classList.add('hidden');
        if (!lmpDateStr || isNaN(cycleLength) || cycleLength < 21 || cycleLength > 45) {
          if (errorBox) { errorBox.textContent = "Please ensure a valid Last Period date is selected and cycle length is between 21 and 45 days."; errorBox.classList.remove('hidden'); }
          return;
        }
        const lmp = new Date(lmpDateStr);
        lmp.setMinutes(lmp.getMinutes() + lmp.getTimezoneOffset());
        const daysToOvulation = cycleLength - 14;
        const ovulationDate = new Date(lmp);
        ovulationDate.setDate(lmp.getDate() + daysToOvulation);
        const fertileStart = new Date(ovulationDate);
        fertileStart.setDate(ovulationDate.getDate() - 5);
        const options = { month: 'short', day: 'numeric', year: 'numeric' };
        if (ovulationDisplay) ovulationDisplay.textContent = ovulationDate.toLocaleDateString('en-US', options);
        if (fertileWindowDisplay) fertileWindowDisplay.textContent = `${fertileStart.toLocaleDateString('en-US', options)} - ${ovulationDate.toLocaleDateString('en-US', options)}`;
        if (resultsArea) resultsArea.classList.remove('hidden');
      });
    }
  };

  // Initialize page-specific behaviors
  document.addEventListener('DOMContentLoaded', () => {
    if (window.kora && window.kora.calculator) window.kora.calculator.init();
  });
})();
