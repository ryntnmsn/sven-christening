<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any" />
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />
    <base href="{{ url('/') }}/" />
    <meta name="theme-color" content="#e9f7fc" />
    <meta name="description" content="You're invited to celebrate with Sven!" />
    <title>You're Invited — Sven's Celebration</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <style>
      :root {
        color-scheme: light;
        --ink: #66543f;
        --blue: #348ac1;
      }
      * {
        box-sizing: border-box;
      }
      button,
      dialog {
        font-family: inherit;
      }
      html {
        min-height: 100%;
        background: #effaff;
      }
      body {
        margin: 0;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        background: linear-gradient(135deg, #f5fcff, #dff3fb 55%, #f6fbfe);
        color: var(--ink);
        font-family: "Poppins", sans-serif;
      }
      .page {
        width: min(100%, 570px);
        min-height: 100vh;
        position: relative;
        background: #eaf8fc url("background.jpg") center top / 100% 100%
          no-repeat;
        box-shadow: 0 0 48px #7caac522;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 0 0 30px;
      }
      .ground-decoration {
        position: fixed;
        z-index: 10;
        bottom: 0;
        left: max(0px, calc((100vw - 570px) / 2));
        display: block;
        width: min(570px, 100vw);
        height: auto;
        pointer-events: none;
      }
      .eyebrow {
        margin: 0;
        color: #5489a8;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 0.24em;
        text-transform: uppercase;
      }
      .headline {
        margin: 7px 0 0;
        color: #527b94;
        font-family: "Poppins", sans-serif;
        font-size: clamp(24px, 7vw, 34px);
        font-weight: 500;
        letter-spacing: 0.02em;
        text-align: center;
      }
      .artwork {
        width: 100%;
        max-width: 570px;
        position: relative;
        line-height: 0;
      }
      .screen {
        width: 100%;
        max-width: 570px;
      }
      .screen[hidden] {
        display: none;
      }
      .cover {
        position: relative;
      }
      .details {
        position: relative;
      }
      .click-hotspot {
        position: absolute;
        z-index: 3;
        left: 43%;
        top: 53%;
        width: 17%;
        height: 10%;
        padding: 0;
        border: 0;
        border-radius: 50%;
        background: transparent;
        cursor: pointer;
      }
      .click-hotspot:focus-visible {
        outline: 3px solid #fff;
        outline-offset: 3px;
        box-shadow: 0 0 0 6px #66543f;
      }
      .details-art {
        position: relative;
        width: 100%;
        line-height: 0;
      }
      .music-hotspot {
        position: absolute;
        z-index: 3;
        left: 60%;
        top: 20%;
        width: 24%;
        height: 3.5%;
        padding: 0;
        border: 0;
        background: transparent;
        cursor: pointer;
      }
      .music-hotspot:focus-visible {
        outline: 3px solid #fff;
        outline-offset: 2px;
        box-shadow: 0 0 0 5px #66543f;
      }
      .details-image {
        display: block;
        width: 100%;
        height: auto;
      }
      .event-countdown {
        position: absolute;
        top: 46%;
        left: 36%;
        width: 44%;
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 2px;
        color: #584936;
        line-height: 1.1;
        text-align: center;
      }
      .countdown-unit {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 3px;
      }
      .countdown-value {
        font:
          700 clamp(15px, 3.8vw, 23px)/1 "Poppins",
          sans-serif;
        font-variant-numeric: tabular-nums;
      }
      .countdown-label {
        font:
          700 clamp(8px, 1.8vw, 10px)/1.1 "Poppins",
          sans-serif;
        letter-spacing: 0.02em;
      }
      .gallery-section {
        width: 100%;
        padding: 30px 18px 34px;
      }
      .gallery-heading {
        display: block;
        width: 100%;
        max-width: 480px;
        height: auto;
        margin: 0 auto 18px;
      }
      .rsvp-section {
        width: 100%;
        padding: 28px 0;
        background: url("background.jpg") center / cover no-repeat;
      }
      .rsvp-heading {
        display: block;
        width: 100%;
        max-width: 480px;
        height: auto;
        margin: 0 auto 18px;
      }
      .rsvp-form {
        display: grid;
        width: min(100% - 36px, 480px);
        gap: 12px;
        margin: 0 auto;
        padding: 22px;
        border: 1px solid #ffffffc9;
        border-radius: 18px;
        background: #ffffffdf;
        box-shadow: 0 8px 24px #466b781a;
      }
      .rsvp-label {
        color: #66543f;
        font-size: 14px;
        font-weight: 600;
      }
      .rsvp-input {
        width: 100%;
        min-height: 48px;
        padding: 0 14px;
        border: 1px solid #cdbba9;
        border-radius: 10px;
        background: white;
        color: #493d31;
        font: 14px "Poppins", sans-serif;
      }
      .rsvp-input:focus {
        border-color: #9a7655;
        outline: 3px solid #9a765526;
      }
      .rsvp-code-input {
        text-transform: uppercase;
        letter-spacing: 0.18em;
      }
      .rsvp-action {
        min-height: 46px;
        padding: 0 18px;
        border: 0;
        border-radius: 999px;
        background: #6b4b35;
        color: white;
        cursor: pointer;
        font: 600 14px "Poppins", sans-serif;
      }
      .rsvp-action:hover {
        background: #4b3426;
      }
      .rsvp-action:disabled {
        cursor: wait;
        opacity: 0.65;
      }
      .rsvp-status {
        margin: 0;
        color: #66543f;
        font-size: 13px;
        line-height: 1.5;
        text-align: center;
      }
      .rsvp-match-box {
        display: grid;
        gap: 12px;
        padding: 16px;
        border: 1px solid #cdbba9;
        border-radius: 12px;
        background: #f8f3ed;
        text-align: center;
      }
      .rsvp-match-box[hidden] {
        display: none;
      }
      .rsvp-match-label {
        margin: 0;
        color: #8a725c;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
      }
      .rsvp-match-name {
        margin: 0;
        color: #4b3426;
        font-size: 19px;
        font-weight: 600;
      }
      .rsvp-reserved-note {
        margin: -4px 0 0;
        color: #75604b;
        font-size: 13px;
        line-height: 1.5;
      }
      .rsvp-subguest-fields {
        display: grid;
        gap: 10px;
        text-align: left;
      }
      .rsvp-subguest-fields[hidden] {
        display: none;
      }
      .rsvp-subguest-row {
        display: grid;
        grid-template-columns: minmax(0, 1fr) auto;
        align-items: center;
        gap: 10px;
      }
      .rsvp-subguest-row .rsvp-input {
        min-width: 0;
      }
      .rsvp-attend {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #66543f;
        font-size: 13px;
        font-weight: 600;
        white-space: nowrap;
      }
      .rsvp-attend input {
        width: 17px;
        height: 17px;
        accent-color: #6b4b35;
      }
      .rsvp-confirmation-dialog {
        width: min(440px, calc(100% - 32px));
        max-width: none;
        padding: 0;
        overflow: visible;
        border: 1px solid #eadfce;
        border-radius: 22px;
        background: #fffdf9;
        color: #4b3426;
        text-align: center;
        box-shadow: 0 24px 80px #24180f40;
      }
      .rsvp-confirmation-dialog::backdrop {
        background: #24180f80;
        backdrop-filter: blur(3px);
      }
      .rsvp-confirmation-content {
        position: relative;
        z-index: 2;
        display: grid;
        justify-items: center;
        gap: 14px;
        padding: 34px 28px 28px;
      }
      .rsvp-confirmation-icon {
        display: block;
        width: 96px;
        height: 128px;
        object-fit: contain;
      }
      .rsvp-confirmation-title {
        margin: 0;
        color: #8a725c;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
      }
      .rsvp-confirmation-message {
        margin: 0;
        font-size: clamp(19px, 5vw, 23px);
        font-weight: 600;
        line-height: 1.45;
      }
      .rsvp-confirmation-thanks {
        margin: -8px 0 0;
        color: #8a725c;
        font-size: 13px;
      }
      .rsvp-confirmation-close {
        min-height: 44px;
        margin-top: 4px;
        padding: 0 24px;
        border: 0;
        border-radius: 999px;
        background: #6b4b35;
        color: white;
        cursor: pointer;
        font: 600 14px "Poppins", sans-serif;
      }
      .rsvp-confirmation-close:hover {
        background: #4b3426;
      }
      .rsvp-confetti-layer {
        position: fixed;
        z-index: 1;
        inset: 0;
        overflow: hidden;
        pointer-events: none;
      }
      .rsvp-confetti-piece {
        position: absolute;
        top: 44%;
        left: 50%;
        width: 9px;
        height: 15px;
        border-radius: 2px;
        background: var(--confetti-color);
        animation: rsvp-confetti-burst 1800ms cubic-bezier(0.12, 0.7, 0.25, 1) forwards;
      }
      @keyframes rsvp-confetti-burst {
        0% {
          opacity: 1;
          transform: translate(-50%, -50%) scale(0.8) rotate(0deg);
        }
        100% {
          opacity: 0;
          transform: translate(calc(-50% + var(--confetti-x)), calc(-50% + var(--confetti-y))) rotate(var(--confetti-rotation));
        }
      }
      .gallery-title {
        margin: 0 0 6px;
        color: #527b94;
        font:
          500 clamp(23px, 6vw, 31px) "Poppins",
          sans-serif;
        text-align: center;
      }
      .gallery-caption {
        margin: 0 0 18px;
        color: #6c8994;
        font:
          14px "Poppins",
          sans-serif;
        text-align: center;
      }
      .gallery-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
      }
      .gallery-tile {
        display: block;
        overflow: hidden;
        padding: 0;
        aspect-ratio: 1.18;
        border: 3px solid #ffffffd9;
        border-radius: 12px;
        background: #d9edf4;
        box-shadow: 0 5px 14px #466b7820;
        cursor: zoom-in;
      }
      .gallery-tile img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.25s ease;
      }
      .gallery-tile:hover img {
        transform: scale(1.04);
      }
      .gallery-controls {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 14px;
        margin-top: 18px;
      }
      .gallery-controls button,
      .lightbox-control {
        display: grid;
        width: 40px;
        height: 40px;
        place-items: center;
        border: 1px solid #8ab4c5;
        border-radius: 50%;
        background: #ffffffdf;
        color: #527b94;
        cursor: pointer;
        font-size: 20px;
      }
      .gallery-controls button:disabled {
        opacity: 0.4;
        cursor: default;
      }
      .gallery-count {
        min-width: 130px;
        color: #668391;
        font-size: 12px;
        text-align: center;
      }
      .lightbox {
        width: min(94vw, 900px);
        max-width: none;
        max-height: 92vh;
        padding: 14px;
        overflow: visible;
        border: 1px solid #ffffffaa;
        border-radius: 16px;
        background: #effaff;
        box-shadow: 0 20px 70px #102b3e66;
      }
      .lightbox::backdrop {
        background: #112b3bd9;
        backdrop-filter: blur(4px);
      }
      .lightbox-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        margin-bottom: 10px;
      }
      .lightbox-count {
        color: #527b94;
        font-size: 13px;
      }
      .lightbox-image {
        display: block;
        width: 100%;
        max-height: 78vh;
        object-fit: contain;
        border-radius: 8px;
      }
      .lightbox-close {
        width: 38px;
        height: 38px;
        border: 0;
        border-radius: 50%;
        background: #dceff5;
        color: #42697d;
        cursor: pointer;
        font-size: 22px;
      }
      .lightbox-control {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 44px;
        height: 44px;
        border: 0;
        background: #ffffffed;
        box-shadow: 0 2px 12px #0003;
      }
      .lightbox-prev {
        left: -18px;
      }
      .lightbox-next {
        right: -18px;
      }
      .back-button {
        display: block;
        margin: 18px auto 0;
        padding: 12px 20px;
        border: 1px solid #79a9bf;
        border-radius: 999px;
        background: #ffffffd9;
        color: #527b94;
        cursor: pointer;
        font:
          700 14px "Poppins",
          sans-serif;
      }
      .art {
        display: block;
        width: 100%;
        height: auto;
        animation: arrive 0.9s ease-out both;
      }
      .floating-balloons {
        position: absolute;
        z-index: 1;
        width: 24%;
        height: auto;
        pointer-events: none;
        filter: drop-shadow(0 5px 7px #497b9620);
        animation: float 4.8s ease-in-out infinite;
      }
      .floating-balloons.one {
        top: 13%;
        left: 1%;
        transform: rotate(-10deg);
      }
      .floating-balloons.two {
        top: 31%;
        right: 0;
        width: 22%;
        animation-delay: -2.2s;
      }
      .hot-air-balloon {
        position: absolute;
        z-index: 2;
        top: 1%;
        left: -18%;
        width: 18%;
        max-width: 92px;
        height: auto;
        opacity: 1;
        pointer-events: none;
        animation: hot-air-drift 28s linear infinite;
      }
      .details-hot-air {
        position: fixed;
        z-index: 11;
        top: 0;
        left: max(0px, calc((100vw - 570px) / 2));
        width: min(200px, 56vw);
        max-width: none;
        animation:
          details-hot-air-drift 28s linear infinite,
          ocean-sail 4.2s ease-in-out infinite;
        pointer-events: auto;
        cursor: grab;
        touch-action: none;
        user-select: none;
      }
      .details-hot-air.dragging {
        cursor: grabbing;
      }
      .details-hot-air.placed {
        animation: ocean-sail 4.2s ease-in-out infinite;
      }
      .details-hot-air.landed {
        width: min(180px, 56vw);
      }
      .balloon-speech {
        position: fixed;
        z-index: 12;
        width: max-content;
        max-width: min(230px, 64vw);
        padding: 10px 14px;
        border: 1px solid #e6d7ba;
        border-radius: 18px;
        background: #fffaf0;
        box-shadow: 0 4px 14px #493a252b;
        color: #5b4937;
        font:
          600 12px/1.4 "Poppins",
          sans-serif;
        text-align: center;
        pointer-events: none;
      }
      .balloon-speech::after {
        position: absolute;
        top: 50%;
        left: -14px;
        border: 7px solid transparent;
        border-right-color: #fffaf0;
        content: "";
        transform: translateY(-50%);
      }
      .balloon-speech.points-right::after {
        right: -14px;
        left: auto;
        border-right-color: transparent;
        border-left-color: #fffaf0;
      }
      .cloud {
        position: absolute;
        z-index: 2;
        bottom: 0;
        left: 50%;
        width: 76%;
        height: auto;
        pointer-events: none;
        animation: cloud-drift 9s ease-in-out infinite alternate;
      }
      .note {
        max-width: 340px;
        margin: 14px 0 18px;
        color: #637f8c;
        font-family: "Poppins", sans-serif;
        font-size: 17px;
        line-height: 1.55;
        text-align: center;
      }
      .rsvp {
        display: inline-flex;
        min-height: 52px;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 0 27px;
        border: 0;
        border-radius: 999px;
        background: linear-gradient(180deg, #55a9dc, #388cc2);
        box-shadow:
          0 6px 0 #2776a5,
          0 12px 22px #3a85aa33;
        color: white;
        cursor: pointer;
        font:
          800 15px/1 "Poppins",
          sans-serif;
        letter-spacing: 0.04em;
        transition:
          transform 0.18s ease,
          box-shadow 0.18s ease,
          background 0.18s ease;
      }
      .rsvp:hover {
        transform: translateY(-2px);
        box-shadow:
          0 8px 0 #2776a5,
          0 15px 24px #3a85aa38;
      }
      .rsvp:active {
        transform: translateY(3px);
        box-shadow: 0 3px 0 #2776a5;
      }
      .rsvp:focus-visible {
        outline: 3px solid #7bc9ef;
        outline-offset: 5px;
      }
      .rsvp.confirmed {
        background: linear-gradient(180deg, #77ad89, #568e68);
        box-shadow:
          0 6px 0 #477957,
          0 12px 22px #47795733;
      }
      .heart {
        font-size: 19px;
        line-height: 1;
      }
      .footer {
        margin: 19px 0 0;
        color: #7193a2;
        font-size: 10px;
        letter-spacing: 0.2em;
        text-transform: uppercase;
      }
      @keyframes arrive {
        from {
          opacity: 0;
          transform: translateY(14px) scale(0.985);
        }
        to {
          opacity: 1;
          transform: translateY(0) scale(1);
        }
      }
      @keyframes float {
        0%,
        100% {
          translate: 0 0;
        }
        50% {
          translate: 0 -12px;
        }
      }
      @keyframes cloud-drift {
        from {
          translate: calc(-50% - 18px) 0;
        }
        to {
          translate: calc(-50% + 18px) 0;
        }
      }
      @keyframes hot-air-drift {
        from {
          left: -18%;
        }
        to {
          left: 100%;
        }
      }
      @keyframes details-hot-air-drift {
        from {
          translate: -100% 0;
        }
        to {
          translate: min(570px, 100vw) 0;
        }
      }
      @keyframes ocean-sail {
        0%,
        100% {
          margin-top: 0;
          rotate: -2deg;
        }
        50% {
          margin-top: 10px;
          rotate: 2deg;
        }
      }
      @media (max-width: 380px) {
        .page {
          padding: 0;
        }
        .note {
          font-size: 16px;
          margin-top: 8px;
        }
      }
      @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
          animation-duration: 0.01ms !important;
          transition-duration: 0.01ms !important;
          scroll-behavior: auto !important;
        }
      }
    </style>
  </head>
  <body>
    <main class="page">
      <section
        class="screen cover"
        id="cover-screen"
        aria-label="Invitation cover"
      >
        <div class="artwork">
          <img
            class="art"
            src="layer_1.jpg"
            alt="You are invited! A watercolor invitation with blue balloons and teddy bears."
            fetchpriority="high"
          />
          <button
            class="click-hotspot"
            id="open-details"
            type="button"
            aria-label="Click me to open the invitation"
          ></button>
          <img
            class="floating-balloons one"
            src="single_balloon_blue.png"
            alt=""
            aria-hidden="true"
          />
          <img
            class="floating-balloons two"
            src="single_balloon_white.png"
            alt=""
            aria-hidden="true"
          />
          <img class="cloud" src="clouds_1.png" alt="" aria-hidden="true" />
        </div>
      </section>
      <section
        class="screen details"
        id="details-screen"
        aria-label="Invitation details"
        hidden
      >
        <div class="details-art">
          <img
            class="details-image"
            src="layer_2.jpg"
            alt="Sven's invitation details, event information, gift ideas, health protocols, and dress code."
          />
          <button
            class="music-hotspot"
            id="music-hotspot"
            type="button"
            aria-label="Click to play music"
            title="Click to play music"
          ></button>
          <div
            class="event-countdown"
            role="timer"
            aria-label="Countdown to December 12, 2026 at 2:30 PM"
          >
            <div class="countdown-unit">
              <span class="countdown-value" id="countdown-days">0</span
              ><span class="countdown-label">Days</span>
            </div>
            <div class="countdown-unit">
              <span class="countdown-value" id="countdown-hours">00</span
              ><span class="countdown-label">Hours</span>
            </div>
            <div class="countdown-unit">
              <span class="countdown-value" id="countdown-minutes">00</span
              ><span class="countdown-label">Minutes</span>
            </div>
            <div class="countdown-unit">
              <span class="countdown-value" id="countdown-seconds">00</span
              ><span class="countdown-label">Seconds</span>
            </div>
          </div>
        </div>
        <img
          class="hot-air-balloon details-hot-air"
          id="hot-air-balloon"
          src="hot_1.png"
          alt=""
          role="button"
          tabindex="0"
          aria-label="Move the hot-air balloon with a drag or the arrow keys"
          draggable="false"
        />
        <div class="balloon-speech" id="hot-air-speech" role="status" hidden>
          Hello po! Tulungan mo po ako makababa para hindi po ako nakaharang
          dito hehe.
        </div>
        <section class="gallery-section" aria-labelledby="gallery-title">
          <h2 id="gallery-title" class="gallery-title">
            <img
              class="gallery-heading"
              src="gallery_text.png"
              alt="Photo gallery"
            />
          </h2>
          <div class="gallery-grid" id="gallery-grid" aria-live="polite"></div>
          <div class="gallery-controls" aria-label="Gallery pages">
            <button
              id="gallery-prev"
              type="button"
              aria-label="Previous gallery page"
            >
              ‹
            </button>
            <span
              class="gallery-count"
              id="gallery-count"
              aria-live="polite"
            ></span>
            <button
              id="gallery-next"
              type="button"
              aria-label="Next gallery page"
            >
              ›
            </button>
          </div>
        </section>
        <section class="rsvp-section" aria-label="RSVP">
          <img class="rsvp-heading" src="rsvp_text.png" alt="RSVP" />
          <form class="rsvp-form" id="rsvp-form">
            <label class="rsvp-label" for="rsvp-guest-name">Guest Name</label>
            <input
              class="rsvp-input"
              id="rsvp-guest-name"
              name="name"
              type="text"
              maxlength="255"
              autocomplete="name"
              placeholder="Enter your name as it appears on the invitation"
              required
            />
            <label class="rsvp-label" for="rsvp-guest-code">Guest Code</label>
            <input
              class="rsvp-input rsvp-code-input"
              id="rsvp-guest-code"
              name="code"
              type="text"
              minlength="3"
              maxlength="3"
              pattern="[A-Za-z0-9]{3}"
              autocomplete="off"
              autocapitalize="characters"
              placeholder="ABC"
              required
            />
            <p class="rsvp-status" id="rsvp-status" role="status" aria-live="polite" hidden></p>
            <button class="rsvp-action" id="rsvp-lookup" type="submit">Check invitation</button>
            <div class="rsvp-match-box" id="rsvp-match-box" hidden>
              <p class="rsvp-match-label">Invitation found for</p>
              <p class="rsvp-match-name" id="rsvp-matched-name"></p>
              <p class="rsvp-reserved-note" id="rsvp-reserved-note" hidden></p>
              <div class="rsvp-subguest-fields" id="rsvp-subguest-fields" hidden></div>
              <button class="rsvp-action" id="rsvp-confirm" type="button">Confirm my seat</button>
            </div>
          </form>
        </section>
        <button class="back-button" id="back-to-cover" type="button">
          ← Back to invitation
        </button>
      </section>
    </main>
    <img
      class="ground-decoration"
      id="ground-decoration"
      src="ground.png"
      alt=""
      aria-hidden="true"
    />
    <audio id="invitation-music" src="sven_mp3.mp4" preload="none" loop></audio>
    <dialog class="rsvp-confirmation-dialog" id="rsvp-confirmation-modal" aria-labelledby="rsvp-confirmation-message">
      <div class="rsvp-confetti-layer" id="rsvp-confetti-layer" aria-hidden="true"></div>
      <div class="rsvp-confirmation-content">
        <img class="rsvp-confirmation-icon" src="sven_well.png" alt="Sven" />
        <p class="rsvp-confirmation-message" id="rsvp-confirmation-message">WELL! WELL! WELL! I'LL SEE YOU THEN</p>
        <p class="rsvp-confirmation-thanks">Thank you for confirming</p>
        <button class="rsvp-confirmation-close" id="rsvp-confirmation-close" type="button">Close</button>
      </div>
    </dialog>
    <dialog class="lightbox" id="lightbox" aria-label="Photo viewer">
      <div class="lightbox-toolbar">
        <span class="lightbox-count" id="lightbox-count"></span>
        <button
          class="lightbox-close"
          id="lightbox-close"
          type="button"
          aria-label="Close photo viewer"
        >
          ×
        </button>
      </div>
      <button
        class="lightbox-control lightbox-prev"
        id="lightbox-prev"
        type="button"
        aria-label="Previous photo"
      >
        ‹
      </button>
      <img class="lightbox-image" id="lightbox-image" alt="" />
      <button
        class="lightbox-control lightbox-next"
        id="lightbox-next"
        type="button"
        aria-label="Next photo"
      >
        ›
      </button>
    </dialog>
    <script>
      const coverScreen = document.getElementById("cover-screen");
      const detailsScreen = document.getElementById("details-screen");
      const invitationMusic = document.getElementById("invitation-music");
      document.getElementById("music-hotspot").addEventListener("click", () => {
        if (invitationMusic.paused) invitationMusic.play().catch(() => {});
        else invitationMusic.pause();
      });
      const hotAirSpeech = document.getElementById("hot-air-speech");
      let speechTimeout = null;
      let speechRevealed = false;
      function positionSpeech() {
        if (hotAirSpeech.hidden || detailsScreen.hidden) return;
        const balloonRect = hotAirBalloon.getBoundingClientRect();
        const speechRect = hotAirSpeech.getBoundingClientRect();
        const useRightSide =
          window.innerWidth - balloonRect.right >= speechRect.width + 16;
        let left = useRightSide
          ? balloonRect.right + 10
          : balloonRect.left - speechRect.width - 10;
        left = Math.max(
          8,
          Math.min(left, window.innerWidth - speechRect.width - 8),
        );
        let top = balloonRect.top + balloonRect.height * 0.32;
        top = Math.max(
          8,
          Math.min(top, window.innerHeight - speechRect.height - 8),
        );
        hotAirSpeech.style.left = `${left}px`;
        hotAirSpeech.style.top = `${top}px`;
        hotAirSpeech.classList.toggle("points-right", !useRightSide);
      }
      function followSpeech() {
        positionSpeech();
        if (!hotAirSpeech.hidden && !detailsScreen.hidden)
          requestAnimationFrame(followSpeech);
      }
      function showSpeechAfterDelay() {
        if (speechRevealed || speechTimeout) return;
        speechTimeout = setTimeout(() => {
          speechTimeout = null;
          if (detailsScreen.hidden) return;
          speechRevealed = true;
          if (!balloonLanded) {
            hotAirSpeech.hidden = false;
            followSpeech();
          }
        }, 10000);
      }
      function showScreen(screen, updateHistory = true) {
        const showDetails = screen === "details";
        coverScreen.hidden = showDetails;
        detailsScreen.hidden = !showDetails;
        if (showDetails) {
          if (speechRevealed && !balloonLanded) {
            hotAirSpeech.hidden = false;
            followSpeech();
          } else {
            showSpeechAfterDelay();
          }
        } else {
          if (speechTimeout) clearTimeout(speechTimeout);
          speechTimeout = null;
          hotAirSpeech.hidden = true;
        }
        document.title = showDetails
          ? "Invitation Details — Sven"
          : "You're Invited — Sven's Celebration";
        if (updateHistory)
          history.pushState(
            { screen },
            "",
            showDetails ? "#details" : location.pathname,
          );
        window.scrollTo(0, 0);
      }
      document
        .getElementById("open-details")
        .addEventListener("click", () => showScreen("details"));
      document
        .getElementById("back-to-cover")
        .addEventListener("click", () => showScreen("cover"));
      window.addEventListener("popstate", () =>
        showScreen(location.hash === "#details" ? "details" : "cover", false),
      );

      const hotAirBalloon = document.getElementById("hot-air-balloon");
      const groundDecoration = document.getElementById("ground-decoration");
      let balloonPointerStart = null;
      let balloonDragOffset = null;
      let balloonHasMoved = false;
      let balloonLanded = false;
      function checkBalloonLanding() {
        const balloonRect = hotAirBalloon.getBoundingClientRect();
        const groundRect = groundDecoration.getBoundingClientRect();
        const groundSurface = groundRect.top + groundRect.height * 0.28;
        const overlapsGround =
          balloonRect.bottom >= groundSurface &&
          balloonRect.right > groundRect.left &&
          balloonRect.left < groundRect.right;
        if (overlapsGround === balloonLanded) return;
        balloonLanded = overlapsGround;
        hotAirBalloon.src = balloonLanded ? "sven.png" : "hot_1.png";
        hotAirBalloon.classList.toggle("landed", balloonLanded);
        hotAirBalloon.setAttribute(
          "aria-label",
          balloonLanded
            ? "Sven landed on the ground. Move with a drag or the arrow keys."
            : "Move the hot-air balloon with a drag or the arrow keys",
        );
        hotAirSpeech.hidden =
          balloonLanded || !speechRevealed || detailsScreen.hidden;
        if (!hotAirSpeech.hidden) followSpeech();
      }
      function freezeBalloonAt(rect) {
        hotAirBalloon.classList.remove("placed");
        hotAirBalloon.style.animation = "none";
        hotAirBalloon.style.translate = "none";
        hotAirBalloon.style.rotate = "0deg";
        hotAirBalloon.style.marginTop = "0";
        hotAirBalloon.style.left = `${rect.left}px`;
        hotAirBalloon.style.top = `${rect.top}px`;
      }
      function resumeBalloonFloat() {
        if (!balloonHasMoved) return;
        hotAirBalloon.style.animation = "";
        hotAirBalloon.classList.add("placed");
      }
      hotAirBalloon.addEventListener("pointerdown", (event) => {
        if (event.button !== 0) return;
        balloonPointerStart = { x: event.clientX, y: event.clientY };
        balloonDragOffset = null;
        balloonHasMoved = false;
        hotAirBalloon.setPointerCapture(event.pointerId);
      });
      hotAirBalloon.addEventListener("pointermove", (event) => {
        if (!balloonPointerStart) return;
        if (!balloonDragOffset) {
          const dx = event.clientX - balloonPointerStart.x;
          const dy = event.clientY - balloonPointerStart.y;
          if (Math.hypot(dx, dy) < 4) return;
          const rect = hotAirBalloon.getBoundingClientRect();
          freezeBalloonAt(rect);
          balloonDragOffset = {
            x: event.clientX - rect.left,
            y: event.clientY - rect.top,
          };
          balloonHasMoved = true;
          hotAirBalloon.classList.add("dragging");
        }
        hotAirBalloon.style.left = `${event.clientX - balloonDragOffset.x}px`;
        hotAirBalloon.style.top = `${event.clientY - balloonDragOffset.y}px`;
        checkBalloonLanding();
      });
      function finishBalloonDrag(event) {
        if (hotAirBalloon.hasPointerCapture(event.pointerId))
          hotAirBalloon.releasePointerCapture(event.pointerId);
        balloonPointerStart = null;
        balloonDragOffset = null;
        hotAirBalloon.classList.remove("dragging");
        checkBalloonLanding();
        resumeBalloonFloat();
      }
      hotAirBalloon.addEventListener("pointerup", finishBalloonDrag);
      hotAirBalloon.addEventListener("pointercancel", finishBalloonDrag);
      hotAirBalloon.addEventListener("keydown", (event) => {
        const moves = {
          ArrowUp: [0, -12],
          ArrowDown: [0, 12],
          ArrowLeft: [-12, 0],
          ArrowRight: [12, 0],
        };
        const move = moves[event.key];
        if (!move) return;
        event.preventDefault();
        if (!balloonHasMoved) {
          freezeBalloonAt(hotAirBalloon.getBoundingClientRect());
          balloonHasMoved = true;
        }
        hotAirBalloon.style.left = `${Number.parseFloat(hotAirBalloon.style.left) + move[0]}px`;
        hotAirBalloon.style.top = `${Number.parseFloat(hotAirBalloon.style.top) + move[1]}px`;
        checkBalloonLanding();
        resumeBalloonFloat();
      });
      if (location.hash === "#details") showScreen("details", false);

      const countdownTarget = new Date("2026-12-12T14:30:00+08:00").getTime();
      const countdownParts = {
        days: document.getElementById("countdown-days"),
        hours: document.getElementById("countdown-hours"),
        minutes: document.getElementById("countdown-minutes"),
        seconds: document.getElementById("countdown-seconds"),
      };
      function updateCountdown() {
        const remaining = Math.max(0, countdownTarget - Date.now());
        const days = Math.floor(remaining / 86400000);
        const hours = Math.floor((remaining % 86400000) / 3600000);
        const minutes = Math.floor((remaining % 3600000) / 60000);
        const seconds = Math.floor((remaining % 60000) / 1000);
        countdownParts.days.textContent = String(days);
        countdownParts.hours.textContent = String(hours).padStart(2, "0");
        countdownParts.minutes.textContent = String(minutes).padStart(2, "0");
        countdownParts.seconds.textContent = String(seconds).padStart(2, "0");
      }
      updateCountdown();
      setInterval(updateCountdown, 1000);

      const galleryFiles = Array.from(
        { length: 39 },
        (_, index) => `img (${index + 1}).${index < 11 ? "jpg" : "JPG"}`,
      );
      const galleryGrid = document.getElementById("gallery-grid");
      const galleryCount = document.getElementById("gallery-count");
      const galleryPrev = document.getElementById("gallery-prev");
      const galleryNext = document.getElementById("gallery-next");
      const galleryPageSize = 6;
      const galleryPageCount = Math.ceil(galleryFiles.length / galleryPageSize);
      let galleryPage = 0;
      let activePhoto = 0;
      const lightbox = document.getElementById("lightbox");
      const lightboxImage = document.getElementById("lightbox-image");
      const lightboxCount = document.getElementById("lightbox-count");

      function renderGallery() {
        const start = galleryPage * galleryPageSize;
        const visibleFiles = galleryFiles.slice(start, start + galleryPageSize);
        galleryGrid.replaceChildren(
          ...visibleFiles.map((src, offset) => {
            const photoIndex = start + offset;
            const tile = document.createElement("button");
            tile.className = "gallery-tile";
            tile.type = "button";
            tile.setAttribute(
              "aria-label",
              `Open photo ${photoIndex + 1} of ${galleryFiles.length}`,
            );
            const image = document.createElement("img");
            image.src = src;
            image.alt = `Sven invitation photo ${photoIndex + 1}`;
            image.loading = "lazy";
            tile.append(image);
            tile.addEventListener("click", () => openLightbox(photoIndex));
            return tile;
          }),
        );
        const first = start + 1;
        const last = Math.min(start + galleryPageSize, galleryFiles.length);
        galleryCount.textContent = `${first}–${last} of ${galleryFiles.length} · page ${galleryPage + 1} of ${galleryPageCount}`;
        galleryPrev.disabled = galleryPage === 0;
        galleryNext.disabled = galleryPage === galleryPageCount - 1;
      }

      function showLightboxPhoto(index) {
        activePhoto = (index + galleryFiles.length) % galleryFiles.length;
        lightboxImage.src = galleryFiles[activePhoto];
        lightboxImage.alt = `Sven invitation photo ${activePhoto + 1} of ${galleryFiles.length}`;
        lightboxCount.textContent = `${activePhoto + 1} of ${galleryFiles.length}`;
      }
      function openLightbox(index) {
        showLightboxPhoto(index);
        lightbox.showModal();
      }
      galleryPrev.addEventListener("click", () => {
        galleryPage -= 1;
        renderGallery();
      });
      galleryNext.addEventListener("click", () => {
        galleryPage += 1;
        renderGallery();
      });
      document
        .getElementById("lightbox-close")
        .addEventListener("click", () => lightbox.close());
      document
        .getElementById("lightbox-prev")
        .addEventListener("click", () => showLightboxPhoto(activePhoto - 1));
      document
        .getElementById("lightbox-next")
        .addEventListener("click", () => showLightboxPhoto(activePhoto + 1));
      lightbox.addEventListener("click", (event) => {
        if (event.target === lightbox) lightbox.close();
      });
      lightbox.addEventListener("keydown", (event) => {
        if (event.key === "ArrowLeft") showLightboxPhoto(activePhoto - 1);
        if (event.key === "ArrowRight") showLightboxPhoto(activePhoto + 1);
      });

      const rsvpForm = document.getElementById("rsvp-form");
      const rsvpName = document.getElementById("rsvp-guest-name");
      const rsvpCode = document.getElementById("rsvp-guest-code");
      const rsvpStatus = document.getElementById("rsvp-status");
      const rsvpLookup = document.getElementById("rsvp-lookup");
      const rsvpConfirm = document.getElementById("rsvp-confirm");
      const rsvpMatchBox = document.getElementById("rsvp-match-box");
      const rsvpMatchedName = document.getElementById("rsvp-matched-name");
      const rsvpReservedNote = document.getElementById("rsvp-reserved-note");
      const rsvpSubGuestFields = document.getElementById("rsvp-subguest-fields");
      const rsvpConfirmationModal = document.getElementById("rsvp-confirmation-modal");
      const rsvpConfettiLayer = document.getElementById("rsvp-confetti-layer");
      const confettiColors = ["#6b4b35", "#b28b5c", "#91c6d2", "#5f9fb7", "#f0d9a8", "#ffffff"];
      const burstConfetti = () => {
        rsvpConfettiLayer.replaceChildren();
        for (let index = 0; index < 64; index += 1) {
          const angle = (Math.PI * 2 * index) / 64 + (Math.random() - 0.5) * 0.25;
          const distance = 110 + Math.random() * 260;
          const piece = document.createElement("span");
          piece.className = "rsvp-confetti-piece";
          piece.style.setProperty("--confetti-color", confettiColors[index % confettiColors.length]);
          piece.style.setProperty("--confetti-x", `${Math.cos(angle) * distance}px`);
          piece.style.setProperty("--confetti-y", `${Math.sin(angle) * distance}px`);
          piece.style.setProperty("--confetti-rotation", `${Math.random() * 900 - 450}deg`);
          piece.addEventListener("animationend", () => piece.remove(), { once: true });
          rsvpConfettiLayer.append(piece);
        }
      };
      document.getElementById("rsvp-confirmation-close").addEventListener("click", () => {
        rsvpConfirmationModal.close();
      });
      const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
      const setRsvpStatus = (message) => {
        rsvpStatus.textContent = message;
        rsvpStatus.hidden = !message;
      };
      const postRsvp = async (url, extra = {}) => {
        const response = await fetch(url, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            "X-CSRF-TOKEN": csrfToken,
          },
          body: JSON.stringify({
            name: rsvpName.value.trim(),
            code: rsvpCode.value.trim().toUpperCase(),
            ...extra,
          }),
        });
        const data = await response.json();
        if (!response.ok) {
          throw new Error(Object.values(data.errors ?? {}).flat()[0] ?? data.message ?? "Please try again.");
        }
        return data;
      };
      rsvpName.addEventListener("input", () => {
        rsvpMatchBox.hidden = true;
        setRsvpStatus("");
      });
      rsvpCode.addEventListener("input", () => {
        rsvpCode.value = rsvpCode.value.toUpperCase().replace(/[^A-Z0-9]/g, "").slice(0, 3);
        rsvpMatchBox.hidden = true;
        setRsvpStatus("");
      });
      rsvpForm.addEventListener("submit", async (event) => {
        event.preventDefault();
        rsvpMatchBox.hidden = true;
        rsvpLookup.disabled = true;
        setRsvpStatus("Checking your invitation…");
        try {
          const result = await postRsvp("{{ route('rsvp.lookup', [], false) }}");
          setRsvpStatus(result.message);
          if (result.eligible) {
            rsvpMatchedName.textContent = result.full_name;
            rsvpSubGuestFields.replaceChildren();
            rsvpReservedNote.hidden = result.sub_guests < 1;
            if (result.sub_guests > 0) {
              const count = document.createElement("strong");
              count.textContent = result.sub_guests;
              rsvpReservedNote.replaceChildren(
                document.createTextNode("Reserved in your honour, "),
                count,
                document.createTextNode(` guest${result.sub_guests === 1 ? "" : "s"} included in the invitation.`),
              );
            }
            for (let index = 0; index < result.sub_guests; index += 1) {
              const row = document.createElement("div");
              row.className = "rsvp-subguest-row";

              const nameInput = document.createElement("input");
              nameInput.className = "rsvp-input";
              nameInput.type = "text";
              nameInput.maxLength = 255;
              nameInput.placeholder = "Name";
              nameInput.setAttribute("aria-label", `Sub guest ${index + 1} name`);

              const attendLabel = document.createElement("label");
              attendLabel.className = "rsvp-attend";
              const attendInput = document.createElement("input");
              attendInput.type = "checkbox";
              attendInput.setAttribute("aria-label", `Sub guest ${index + 1} will attend`);
              const attendText = document.createElement("span");
              attendText.textContent = "Attend";
              attendLabel.append(attendInput, attendText);

              row.append(nameInput, attendLabel);
              rsvpSubGuestFields.append(row);
            }
            rsvpSubGuestFields.hidden = result.sub_guests < 1;
            rsvpMatchBox.hidden = false;
          }
        } catch (error) {
          setRsvpStatus(error.message);
        } finally {
          rsvpLookup.disabled = false;
        }
      });
      rsvpConfirm.addEventListener("click", async () => {
        rsvpConfirm.disabled = true;
        setRsvpStatus("Confirming your seat…");
        try {
          const subGuests = Array.from(rsvpSubGuestFields.querySelectorAll(".rsvp-subguest-row"), (row) => ({
            name: row.querySelector('input[type="text"]').value.trim() || null,
            attending: row.querySelector('input[type="checkbox"]').checked,
          }));
          const result = await postRsvp("{{ route('rsvp.confirm', [], false) }}", { sub_guests: subGuests });
          rsvpMatchBox.hidden = true;
          if (result.confirmed) {
            setRsvpStatus("");
            rsvpConfirmationModal.showModal();
            burstConfetti();
          } else {
            setRsvpStatus(result.message);
          }
        } catch (error) {
          setRsvpStatus(error.message);
          rsvpConfirm.hidden = true;
        } finally {
          rsvpConfirm.disabled = false;
        }
      });
      renderGallery();
    </script>
  </body>
</html>

