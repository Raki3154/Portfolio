// ===== ENHANCED PORTFOLIO SCRIPT =====

// Loading Screen
window.addEventListener('load', () => {
  const loadingScreen = document.querySelector('.loading-screen');
  if (loadingScreen) {
    setTimeout(() => {
      loadingScreen.classList.add('hidden');
      setTimeout(() => {
        loadingScreen.style.display = 'none';
      }, 500);
    }, 2000);
  }
});

// Particle.js Configuration
if (typeof particlesJS !== 'undefined') {
  particlesJS('particles-js', {
    particles: {
      number: {
        value: 80,
        density: {
          enable: true,
          value_area: 800
        }
      },
      color: {
        value: ['#00d4ff', '#ff00ff', '#ffffff']
      },
      shape: {
        type: 'circle',
        stroke: {
          width: 0,
          color: '#000000'
        }
      },
      opacity: {
        value: 0.5,
        random: false,
        anim: {
          enable: false,
          speed: 1,
          opacity_min: 0.1,
          sync: false
        }
      },
      size: {
        value: 3,
        random: true,
        anim: {
          enable: false,
          speed: 40,
          size_min: 0.1,
          sync: false
        }
      },
      line_linked: {
        enable: true,
        distance: 150,
        color: '#00d4ff',
        opacity: 0.4,
        width: 1
      },
      move: {
        enable: true,
        speed: 2,
        direction: 'none',
        random: false,
        straight: false,
        out_mode: 'out',
        bounce: false,
        attract: {
          enable: false,
          rotateX: 600,
          rotateY: 1200
        }
      }
    },
    interactivity: {
      detect_on: 'canvas',
      events: {
        onhover: {
          enable: true,
          mode: 'repulse'
        },
        onclick: {
          enable: true,
          mode: 'push'
        },
        resize: true
      },
      modes: {
        grab: {
          distance: 400,
          line_linked: {
            opacity: 1
          }
        },
        bubble: {
          distance: 400,
          size: 40,
          duration: 2,
          opacity: 8,
          speed: 3
        },
        repulse: {
          distance: 200,
          duration: 0.4
        },
        push: {
          particles_nb: 4
        },
        remove: {
          particles_nb: 2
        }
      }
    },
    retina_detect: true
  });
}

// Smooth scroll for internal links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      const headerOffset = 80;
      const elementPosition = target.getBoundingClientRect().top;
      const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

      window.scrollTo({
        top: offsetPosition,
        behavior: 'smooth'
      });

      // Close mobile nav if open
      if (window.innerWidth < 900) {
        const navMenu = document.getElementById('nav-menu');
        if (navMenu) navMenu.classList.remove('active');
      }
    }
  });
});

// Mobile nav toggle
const navToggle = document.getElementById('nav-toggle');
const navMenu = document.getElementById('nav-menu');

if (navToggle && navMenu) {
  navToggle.addEventListener('click', () => {
    navMenu.classList.toggle('active');
    
    // Animate hamburger to X
    const spans = navToggle.querySelectorAll('span');
    spans.forEach((span, index) => {
      if (navMenu.classList.contains('active')) {
        if (index === 0) span.style.transform = 'rotate(45deg) translate(5px, 5px)';
        if (index === 1) span.style.opacity = '0';
        if (index === 2) span.style.transform = 'rotate(-45deg) translate(7px, -6px)';
      } else {
        span.style.transform = 'none';
        span.style.opacity = '1';
      }
    });
  });
}

// Reveal on scroll with enhanced animations
const reveals = document.querySelectorAll('.reveal');
const revealOnScroll = () => {
  reveals.forEach((el, index) => {
    const rect = el.getBoundingClientRect();
    const windowHeight = window.innerHeight;
    
    if (rect.top < windowHeight - 100) {
      el.classList.add('active');
      
      // Add staggered animation delay
      el.style.transitionDelay = `${index * 0.1}s`;
      
      // Add floating animation to cards
      if (el.classList.contains('skills') || el.classList.contains('projects')) {
        const cards = el.querySelectorAll('.skill-card, .project-card');
        cards.forEach((card, cardIndex) => {
          card.style.animationDelay = `${(index * 0.1) + (cardIndex * 0.1)}s`;
        });
      }
    }
  });
};

window.addEventListener('scroll', revealOnScroll);
window.addEventListener('load', revealOnScroll);


// Counter animation function
function animateCounter(element, start, end, duration) {
  let startTimestamp = null;
  const step = (timestamp) => {
    if (!startTimestamp) startTimestamp = timestamp;
    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
    const current = Math.floor(progress * (end - start) + start);
    element.textContent = current + '%';
    if (progress < 1) {
      window.requestAnimationFrame(step);
    }
  };
  window.requestAnimationFrame(step);
}

// Enhanced typewriter effect
(function() {
  const el = document.querySelector('.typewriter');
  if (!el) return;
  
  const words = JSON.parse(el.getAttribute('data-words'));
  let idx = 0, char = 0, deleting = false;
  const speed = 80, pause = 1500;

  function tick() {
    const current = words[idx];
    if (!deleting) {
      el.textContent = current.substring(0, char + 1);
      char++;
      if (char === current.length) {
        deleting = true;
        setTimeout(tick, pause);
        return;
      }
    } else {
      el.textContent = current.substring(0, char - 1);
      char--;
      if (char === 0) {
        deleting = false;
        idx = (idx + 1) % words.length;
      }
    }
    setTimeout(tick, deleting ? speed / 2 : speed);
  }
  tick();
})();

// Floating elements parallax effect
const floatingElements = document.querySelectorAll('.float-element');
window.addEventListener('scroll', () => {
  const scrolled = window.pageYOffset;
  floatingElements.forEach(element => {
    const speed = element.getAttribute('data-speed') || 1;
    element.style.transform = `translateY(${scrolled * speed * 0.1}px)`;
  });
});

// Mouse move effect for hero section
const hero = document.querySelector('.hero');
if (hero) {
  hero.addEventListener('mousemove', (e) => {
    const { clientX, clientY } = e;
    const { innerWidth, innerHeight } = window;
    
    const x = (clientX / innerWidth - 0.5) * 20;
    const y = (clientY / innerHeight - 0.5) * 20;
    
    // Apply effect to floating elements instead of profile container
    const floatingElements = hero.querySelectorAll('.float-element');
    floatingElements.forEach((element, index) => {
      const speed = parseFloat(element.dataset.speed) || 1;
      element.style.transform = `translate(${x * speed}px, ${y * speed}px)`;
    });
  });
}

// Enhanced form validation with visual feedback
const form = document.getElementById('contactForm');
if (form) {
  form.addEventListener('submit', e => {
    e.preventDefault();
    
    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const subject = document.getElementById('subject');
    const message = document.getElementById('message');
    
    if (!name.value.trim() || !email.value.trim() || !subject.value.trim() || !message.value.trim()) {
      showNotification('Please fill all fields before submitting.', 'error');
      return;
    }
    
    // Create form data
    const formData = new FormData();
    formData.append('name', name.value.trim());
    formData.append('email', email.value.trim());
    formData.append('subject', subject.value.trim());
    formData.append('message', message.value.trim());
    
    // Update button state
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
    submitBtn.disabled = true;
    
    // Submit form via AJAX
    fetch('contact.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        showNotification(data.message, 'success');
        form.reset();
      } else {
        showNotification(data.message, 'error');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      showNotification('Sorry, there was an error. Please try again later.', 'error');
    })
    .finally(() => {
      submitBtn.innerHTML = originalText;
      submitBtn.disabled = false;
    });
  });
}

// Notification system
function showNotification(message, type = 'info') {
  const notification = document.createElement('div');
  notification.className = `notification notification-${type}`;
  notification.innerHTML = `
    <div class="notification-content">
      <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'}"></i>
      <span>${message}</span>
    </div>
  `;
  
  // Add styles
  notification.style.cssText = `
    position: fixed;
    top: 20px;
    right: 20px;
    background: ${type === 'success' ? '#00d4ff' : type === 'error' ? '#ff4757' : '#3742fa'};
    color: white;
    padding: 15px 20px;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    z-index: 10000;
    transform: translateX(400px);
    transition: transform 0.3s ease;
    max-width: 300px;
  `;
  
  document.body.appendChild(notification);
  
  // Animate in
  setTimeout(() => {
    notification.style.transform = 'translateX(0)';
  }, 100);
  
  // Remove after 5 seconds
  setTimeout(() => {
    notification.style.transform = 'translateX(400px)';
    setTimeout(() => {
      document.body.removeChild(notification);
    }, 300);
  }, 5000);
}

// Intersection Observer for better performance
const observerOptions = {
  threshold: 0.1,
  rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('active');
    }
  });
}, observerOptions);

// Observe all reveal elements
reveals.forEach(el => observer.observe(el));

// Add CSS for notifications
const notificationStyles = document.createElement('style');
notificationStyles.textContent = `
  .notification-content {
    display: flex;
    align-items: center;
    gap: 10px;
  }
  
  .notification-content i {
    font-size: 1.2rem;
  }
`;

document.head.appendChild(notificationStyles);

// Parallax scrolling effect for sections
window.addEventListener('scroll', () => {
  const scrolled = window.pageYOffset;
  const parallaxElements = document.querySelectorAll('.about, .skills, .projects, .contact');
  
  parallaxElements.forEach((element, index) => {
    const speed = 0.5 + (index * 0.1);
    element.style.transform = `translateY(${scrolled * speed * 0.1}px)`;
  });
});

// Add some CSS animations
const additionalStyles = document.createElement('style');
additionalStyles.textContent = `
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  @keyframes slideInLeft {
    from {
      opacity: 0;
      transform: translateX(-30px);
    }
    to {
      opacity: 1;
      transform: translateX(0);
    }
  }
  
  @keyframes slideInRight {
    from {
      opacity: 0;
      transform: translateX(30px);
    }
    to {
      opacity: 1;
      transform: translateX(0);
    }
  }
  
  .skill-card, .project-card {
    animation: fadeInUp 0.6s ease forwards;
    opacity: 0;
  }
  
  .about-text {
    animation: slideInLeft 0.8s ease forwards;
    opacity: 0;
  }
  
  .about-stats {
    animation: slideInRight 0.8s ease forwards;
    opacity: 0;
  }
`;

document.head.appendChild(additionalStyles);

// Initialize everything when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
  // Trigger initial animations
  setTimeout(() => {
    revealOnScroll();
    fillSkills();
  }, 100);
  
  // Add smooth hover effects
  const cards = document.querySelectorAll('.skill-card, .project-card, .stat-card');
  cards.forEach(card => {
    card.addEventListener('mouseenter', () => {
      card.style.transform = 'translateY(-10px) scale(1.02)';
    });
    
    card.addEventListener('mouseleave', () => {
      card.style.transform = 'translateY(0) scale(1)';
    });
  });
});