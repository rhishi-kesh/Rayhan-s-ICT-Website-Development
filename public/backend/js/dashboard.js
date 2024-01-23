$(function () {
  //
  // Carousel
  //
  $(".counter-carousel").owlCarousel({
    loop: true,
    margin: 30,
    dots: false,
    mouseDrag: true,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplaySpeed: 2000,
    nav: false,
    rtl: true,
    responsive: {
      0: {
        items: 2,
      },
      576: {
        items: 2,
      },
      768: {
        items: 3,
      },
      1200: {
        items: 5,
      },
      1400: {
        items: 6,
      },
    },
  });
  // =====================================
  // Stats
  // =====================================
  var stats = {
    chart: {
      id: "sparkline3",
      type: "area",
      height: 180,
      sparkline: {
        enabled: true,
      },
      group: "sparklines",
      fontFamily: "Plus Jakarta Sans', sans-serif",
      foreColor: "#adb0bb",
    },
    series: [
      {
        name: "Weekly Stats",
        color: "var(--bs-primary)",
        data: [5, 15, 10, 20],
      },
    ],
    stroke: {
      curve: "smooth",
      width: 2,
    },
    fill: {
      type: "gradient",
      gradient: {
        shadeIntensity: 0,
        inverseColors: false,
        opacityFrom: 0.20,
        opacityTo: 0,
        stops: [20, 180],
      },
    },

    markers: {
      size: 0,
    },
    tooltip: {
      theme: "dark",
      fixed: {
        enabled: true,
        position: "right",
      },
      x: {
        show: false,
      },
    },
  };
  new ApexCharts(document.querySelector("#stats"), stats).render();
});
