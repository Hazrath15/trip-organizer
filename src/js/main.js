

(function ($) {
	"use strict";

	$('a[href="#contact"]').on('click', function(e){
        e.preventDefault(); // Prevent the link from jumping
        $('#contactModal').fadeIn();
    });

    // Close the modal when the 'x' button is clicked
    $('.close-button').on('click', function(){
        $('#contactModal').fadeOut();
    });

    // Close the modal when clicking outside of it
    $(window).on('click', function(e){
        if ($(e.target).is('#contactModal')) {
            $('#contactModal').fadeOut();
        }
    });

    $("#contactModal form").on("submit", function (e) {
        e.preventDefault();

        let formData = $(this).serializeArray();
        let data = {};
        $.each(formData, function (_, field) {
            data[field.name] = field.value;
        });

        $.ajax({
            url: contactFormData.restUrl,
            type: "POST",
            data: JSON.stringify(data),
            contentType: "application/json",
            dataType: "json",
            beforeSend: function (xhr) {
                xhr.setRequestHeader("X-WP-Nonce", contactFormData.nonce);
            },
            success: function (response) {
                if (response.success) {
                    $("#contactModal form")[0].reset();
                    $("#contactModal .contact-information-block").html('✅ Request sent successfully! Check your email.');
                } else {
                    $("#contactModal .contact-information-block").html('❌ ' + response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
                alert("⚠ Something went wrong.");
            }
        });
    });

    const modal = $("#filterModal");
    const openBtn = $(".filter-tab .trip-tab-btn");
    const closeBtn = $(".filter-close");

    // Open modal
    openBtn.on("click", function(e) {
        e.preventDefault();
        modal.fadeIn();
    });

    // Close modal
    closeBtn.on("click", function() {
        modal.fadeOut();
    });

    // Submit filters
    $("#tripFilterForm").on("submit", function(e) {
        e.preventDefault();

        let formData = $(this).serialize();

        $.ajax({
            url: contactFormData.ajax_url, // localized
            type: "POST",
            data: {
                action: "filter_trips",
                security: contactFormData.nonce,
                data: formData
            },
            beforeSend: function() {
                $(".trip-list").html("<p>Loading...</p>");
            },
            success: function(response) {
                $(".trip-list").html(response);
                modal.fadeOut();
            },
            error: function() {
                $(".trip-list").html("<p>Error loading trips.</p>");
            }
        });
    });

})(jQuery);

  const items = document.querySelectorAll('.timeline-item');

	function activateOnScroll() {
    // 👉 trigger 90% from top instead of waiting for full visibility
    let triggerBottom = window.innerHeight * 0.7;

    items.forEach((item) => {
      const itemTop = item.getBoundingClientRect().top;

      if (itemTop < triggerBottom) {
      item.classList.add('active');
      } else {
      item.classList.remove('active');
      }
    });
	}

	window.addEventListener('scroll', activateOnScroll);
	window.addEventListener('load', activateOnScroll);

document.addEventListener("DOMContentLoaded", function () {
  // Duration Slider
  var durationSlider = document.getElementById('duration-slider');
  noUiSlider.create(durationSlider, {
    start: [contactFormData.minDuration, contactFormData.maxDuration],
    connect: true,
    step: 1,
    range: {
      'min': parseInt(contactFormData.minDuration, 10),
      'max': parseInt(contactFormData.maxDuration, 10)
    }
  });

  var minDays = document.getElementById('min_days');
  var maxDays = document.getElementById('max_days');

  durationSlider.noUiSlider.on('update', function (values, handle) {
    if (handle === 0) {
      minDays.value = Math.round(values[0]);
    } else {
      maxDays.value = Math.round(values[1]);
    }
  });

  minDays.addEventListener('change', function () {
    durationSlider.noUiSlider.set([this.value, null]);
  });
  maxDays.addEventListener('change', function () {
    durationSlider.noUiSlider.set([null, this.value]);
  });

  // Price Slider
   var priceSlider = document.getElementById('price-slider');
    noUiSlider.create(priceSlider, {
    start: [contactFormData.minPrice, contactFormData.maxPrice],
    connect: true,
    step: 100, // adjust step
    range: {
      'min': parseInt(contactFormData.minPrice, 10),
      'max': parseInt(contactFormData.maxPrice, 10)
    }
  });

  var minPrice = document.getElementById('min_price');
  var maxPrice = document.getElementById('max_price');

  priceSlider.noUiSlider.on('update', function (values, handle) {
    if (handle === 0) {
      minPrice.value = Math.round(values[0]);
    } else {
      maxPrice.value = Math.round(values[1]);
    }
  });

  minPrice.addEventListener('change', function () {
    priceSlider.noUiSlider.set([this.value, null]);
  });
  maxPrice.addEventListener('change', function () {
    priceSlider.noUiSlider.set([null, this.value]);
  });
});
