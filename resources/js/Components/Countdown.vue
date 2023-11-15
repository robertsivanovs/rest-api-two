<template>
    <div class="countdown">
      <!-- Display days -->
      <!-- <div class="time">
        <span class="countdown-time-num">{{ countdownDays }}</span>
        <span class="countdown-time-text"> Days </span>
      </div> -->
      <!-- Display hours -->
      <div class="time">
        <span class="countdown-time-num">{{ countdownHours }}</span>
        <span class="countdown-time-text"> Hours </span>
      </div>
      <!-- Display the colon separator -->
      <div class="time">
        <div class="colon-container">
          <span class="circle"></span>
          <span class="circle"></span>
        </div>
      </div>
      <!-- Display minutes -->
      <div class="time">
        <span class="countdown-time-num">{{ countdownMinutes }}</span>
        <span class="countdown-time-text"> Minutes </span>
      </div>
      <!-- Display the colon separator -->
      <div class="time">
        <div class="colon-container">
          <span class="circle"></span>
          <span class="circle"></span>
        </div>
      </div>
      <!-- Display seconds -->
      <div class="time">
        <span class="countdown-time-num">{{ countdownSeconds }}</span>
        <span class="countdown-time-text"> Seconds </span>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
        startingDate: String,
        required: true
    },
    data: function () {
      return {
        targetDate: new Date(this.startingDate), // Starting time for the countdown
        timeDifference: 0, // Stores the time difference between target and current date
      };
    },
    computed: {
      // Calculate the number of days remaining in the countdown
      countdownDays() {
        return Math.floor(this.timeDifference / (1000 * 60 * 60 * 24));
      },
      // Calculate the number of hours remaining in the countdown
      countdownHours() {
        return Math.floor((this.timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      },
      // Calculate the number of minutes remaining in the countdown
      countdownMinutes() {
        return Math.floor((this.timeDifference % (1000 * 60 * 60)) / (1000 * 60));
      },
      // Calculate the number of seconds remaining in the countdown
      countdownSeconds() {
        return Math.floor((this.timeDifference % (1000 * 60)) / 1000);
      },
    },
    mounted() {
      // Set the target time +24 hours
      this.targetDate.setHours(this.targetDate.getHours() + 24);
  
      // Update the countdown every second
      setInterval(this.updateCountdown, 1000);
    },
    methods: {
      updateCountdown() {
        const currentDate = new Date();
        this.timeDifference = this.targetDate - currentDate;
      },
    },
  }
  </script>
