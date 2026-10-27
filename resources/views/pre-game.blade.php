<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#dff5ff">
    <meta name="description" content="Take a quick flight in Sven's pre-game. Tap to flap and guide your bird through the gates.">
    <title>Pre Game | Sven's Celebration</title>
    <link rel="icon" href="/favicon.ico?v=2" sizes="any">
    <link rel="icon" type="image/png" href="/favicon.png?v=2">
    <style>
        :root {
            color-scheme: light;
            font-family: "Trebuchet MS", "Segoe UI", sans-serif;
            color: #4b3426;
            background: #e7f7ff;
            font-synthesis: none;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        * { box-sizing: border-box; }
        body {
            min-width: 320px;
            min-height: 100vh;
            margin: 0;
            padding: 22px;
            background: radial-gradient(ellipse at 50% 0%, #fff 0, #edfaff 42%, #d8f2fd 100%);
        }
        button, a { font: inherit; }
        .page-shell { width: min(100%, 1000px); margin: 0 auto; }
        .topbar { display: flex; align-items: center; justify-content: space-between; gap: 18px; margin-bottom: 14px; }
        .back-link { color: #71563f; font-size: 14px; font-weight: 700; text-decoration: none; }
        .back-link:hover { text-decoration: underline; }
        .eyebrow { margin: 0 0 3px; color: #9b795d; font-size: 11px; font-weight: 800; letter-spacing: .16em; text-transform: uppercase; }
        h1 { margin: 0; font-size: clamp(28px, 5vw, 42px); letter-spacing: -.05em; }
        .page-intro { margin: 5px 0 0; color: #887460; font-size: 14px; }
        .game-layout { display: flex; justify-content: center; }
        .game-panel { width: min(100%, 560px); padding: 18px; border: 1px solid #d7e8e8; border-radius: 22px; background: #ffffffd9; box-shadow: 0 14px 38px #385a6814; }
        .game-topline { display: flex; align-items: center; justify-content: space-between; gap: 12px; margin: 0 auto 12px; width: min(100%, 460px); }
        .game-label { color: #89725d; font-size: 12px; font-weight: 800; letter-spacing: .13em; text-transform: uppercase; }
        .scoreboard { display: flex; gap: 8px; }
        .score-pill { min-width: 78px; padding: 7px 10px; border: 1px solid #eadcc9; border-radius: 999px; background: #fffaf2; text-align: center; }
        .score-pill span { display: block; color: #9a8067; font-size: 9px; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; }
        .score-pill strong { display: block; margin-top: 1px; color: #4b3426; font-size: 17px; line-height: 1; }
        .game-world {
            position: relative;
            width: min(100%, 460px);
            height: min(68vh, 620px);
            min-height: 420px;
            margin: 0 auto;
            overflow: hidden;
            border: 5px solid #fff;
            border-radius: 20px;
            background: linear-gradient(#9fe1f7 0%, #d8f6ff 58%, #ecfaef 100%);
            box-shadow: inset 0 0 0 1px #a8d9e5, 0 8px 22px #33515d1c;
            touch-action: manipulation;
            user-select: none;
        }
        .background-asset-slot { position: absolute; inset: 0; z-index: 0; pointer-events: none; }
        .sun { position: absolute; top: 10%; right: 12%; width: 66px; aspect-ratio: 1; border-radius: 50%; background: #fff1b9; box-shadow: 0 0 0 12px #fff1b933; }
        .cloud { position: absolute; width: 74px; height: 22px; border-radius: 99px; background: #ffffffb8; }
        .cloud::before, .cloud::after { position: absolute; bottom: 6px; border-radius: 50%; background: inherit; content: ""; }
        .cloud::before { left: 13px; width: 28px; height: 28px; }
        .cloud::after { left: 34px; width: 36px; height: 36px; }
        .cloud--one { top: 19%; left: 9%; }
        .cloud--two { top: 37%; right: 5%; transform: scale(.72); }
        .playfield { position: absolute; inset: 0 0 58px; z-index: 1; overflow: hidden; }
        .pipes { position: absolute; inset: 0; }
        .pipe { position: absolute; width: 66px; border: 4px solid #317748; background: linear-gradient(90deg, #53b66b, #83d881 42%, #4ca95e); box-shadow: inset 8px 0 #ffffff20, 3px 0 0 #28663d; }
        .pipe--top { top: 0; border-radius: 0 0 5px 5px; }
        .pipe--bottom { border-radius: 5px 5px 0 0; }
        .pipe--top::after, .pipe--bottom::before { position: absolute; left: -10px; width: 74px; height: 20px; border: 4px solid #317748; border-radius: 4px; background: linear-gradient(90deg, #49a95e, #85d980 45%, #49a95e); content: ""; }
        .pipe--top::after { bottom: -4px; }
        .pipe--bottom::before { top: -4px; }
        .player-slot {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 3;
            width: 48px;
            height: 48px;
            border: 2px solid #fff;
            border-radius: 50%;
            background: #fff;
            box-shadow: 0 4px 9px #553b241f;
            object-fit: cover;
            will-change: transform;
        }
        .ground-asset-slot { position: absolute; right: 0; bottom: 0; left: 0; z-index: 4; height: 58px; border-top: 5px solid #78b85d; background: repeating-linear-gradient(135deg, #d7ba83 0 12px, #ceb078 12px 24px); }
        .ground-asset-slot::before { position: absolute; inset: 5px 0 auto; height: 8px; background: repeating-linear-gradient(90deg, #80c767 0 25px, #9ed478 25px 48px); content: ""; }
        .overlay { position: absolute; inset: 0; z-index: 5; display: grid; place-items: center; padding: 20px; background: #294b5a2b; }
        .overlay[hidden] { display: none; }
        .overlay-card { width: min(100%, 280px); padding: 24px 20px; border: 1px solid #eedcc5; border-radius: 20px; background: #fffaf1f2; box-shadow: 0 12px 32px #274d5c26; text-align: center; }
        .overlay-card h2 { margin: 0; color: #4b3426; font-size: 24px; letter-spacing: -.04em; }
        .overlay-card p { margin: 8px 0 18px; color: #806d59; font-size: 13px; line-height: 1.5; }
        .game-button { min-height: 46px; padding: 0 22px; border: 0; border-radius: 999px; background: #6b4b35; color: #fff; cursor: pointer; font-weight: 800; transition: background .16s ease, transform .16s ease; }
        .game-button:hover { transform: translateY(-1px); background: #4b3426; }
        .game-button:focus-visible, .back-link:focus-visible { outline: 3px solid #e5a151; outline-offset: 3px; }
        @media (max-width: 760px) {
            body { padding: 14px; }
            .game-layout { display: block; }
            .game-panel { padding: 12px; }
            .game-world { height: min(62vh, 620px); min-height: 390px; }
        }
        @media (max-height: 700px) and (min-width: 761px) {
            body { padding-top: 12px; }
            .game-world { height: min(66vh, 540px); min-height: 360px; }
        }
    </style>
</head>
<body>
    <main class="page-shell">
        <header class="topbar">
            <div>
                <p class="eyebrow">Sven's celebration</p>
                <h1>Pre Game</h1>
                <p class="page-intro">A little warm-up before the big day.</p>
            </div>
            <a class="back-link" href="{{ route('home') }}">← Back to invitation</a>
        </header>

        <div class="game-layout">
            <section class="game-panel" aria-label="Pre Game Flap game">
                <div class="game-topline">
                    <span class="game-label">Flap through the gates</span>
                    <div class="scoreboard" aria-label="Scoreboard">
                        <div class="score-pill"><span>Score</span><strong id="score">0</strong></div>
                        <div class="score-pill"><span>Best</span><strong>599</strong></div>
                    </div>
                </div>

                <div class="game-world" id="game-world" role="application" aria-label="Game area. Tap or press Space to flap.">
                    <div class="background-asset-slot" data-asset-slot="background" aria-hidden="true">
                        <div class="sun"></div>
                        <div class="cloud cloud--one"></div>
                        <div class="cloud cloud--two"></div>
                    </div>
                    <div class="playfield" id="playfield">
                        <div class="pipes" id="pipes"></div>
                        <img class="player-slot" id="player" data-asset-slot="character" src="{{ asset('favicon.png') }}" alt="Sven">
                    </div>
                    <div class="ground-asset-slot" data-asset-slot="ground" aria-hidden="true"></div>
                    <div class="overlay" id="game-overlay">
                        <div class="overlay-card">
                            <h2 id="overlay-title">Ready to fly?</h2>
                            <p id="overlay-message">Tap the screen or press Space to flap through the gates.</p>
                            <button class="game-button" id="game-button" type="button">Start game</button>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <script>
        (() => {
            const world = document.getElementById('game-world');
            const playfield = document.getElementById('playfield');
            const player = document.getElementById('player');
            const pipesLayer = document.getElementById('pipes');
            const overlay = document.getElementById('game-overlay');
            const overlayTitle = document.getElementById('overlay-title');
            const overlayMessage = document.getElementById('overlay-message');
            const gameButton = document.getElementById('game-button');
            const scoreLabel = document.getElementById('score');

            const gravity = 1320;
            const flapVelocity = -430;
            const pipeSpeed = 190;
            const pipeWidth = 66;
            const pipeGap = 174;
            const spawnInterval = 1.55;
            const floorHeight = 58;
            const birdXRatio = 0.27;
            const playerWidth = 48;
            const playerHeight = 48;

            let state = 'ready';
            let playerY = 0;
            let velocity = 0;
            let score = 0;
            let pipes = [];
            let spawnTimer = 0;
            let previousFrame = 0;
            let animationFrame = 0;

            const fieldHeight = () => playfield.clientHeight;
            const fieldWidth = () => playfield.clientWidth;
            const birdX = () => fieldWidth() * birdXRatio;
            const gapSize = () => Math.min(pipeGap, Math.max(142, fieldHeight() * 0.31));

            const setPlayerPosition = () => {
                player.style.transform = `translate(${birdX() - playerWidth / 2}px, ${playerY - playerHeight / 2}px) rotate(${Math.max(-24, Math.min(65, velocity * 0.055))}deg)`;
            };

            const updateScore = (value) => {
                score = value;
                scoreLabel.textContent = String(score);
            };

            const clearPipes = () => {
                pipes.forEach((pipe) => {
                    pipe.top.remove();
                    pipe.bottom.remove();
                });
                pipes = [];
                pipesLayer.replaceChildren();
            };

            const resetGame = () => {
                cancelAnimationFrame(animationFrame);
                clearPipes();
                updateScore(0);
                velocity = 0;
                playerY = fieldHeight() * 0.44;
                spawnTimer = 0.65;
                state = 'ready';
                setPlayerPosition();
                overlay.hidden = false;
                overlayTitle.textContent = 'Ready to fly?';
                overlayMessage.textContent = 'Tap the screen or press Space to flap through the gates.';
                gameButton.textContent = 'Start game';
            };

            const addPipePair = () => {
                const height = fieldHeight();
                const gap = gapSize();
                const minGapTop = 40;
                const maxGapTop = Math.max(minGapTop + 1, height - gap - 56);
                const gapTop = minGapTop + Math.random() * (maxGapTop - minGapTop);
                const top = document.createElement('div');
                const bottom = document.createElement('div');
                top.className = 'pipe pipe--top';
                bottom.className = 'pipe pipe--bottom';
                top.style.left = '0';
                bottom.style.left = '0';
                top.style.height = `${gapTop}px`;
                bottom.style.top = `${gapTop + gap}px`;
                bottom.style.height = `${Math.max(0, height - gapTop - gap)}px`;
                pipesLayer.append(top, bottom);
                pipes.push({ x: fieldWidth() + pipeWidth, gapTop, gap, top, bottom, scored: false });
            };

            const endGame = () => {
                state = 'over';
                overlay.hidden = false;
                overlayTitle.textContent = 'Nice flight!';
                overlayMessage.textContent = `You passed ${score} ${score === 1 ? 'gate' : 'gates'}. Give it another try?`;
                gameButton.textContent = 'Play again';
            };

            const flap = () => {
                if (state === 'ready') {
                    state = 'playing';
                    overlay.hidden = true;
                    previousFrame = performance.now();
                    animationFrame = requestAnimationFrame(updateGame);
                }
                if (state === 'playing') {
                    velocity = flapVelocity;
                }
            };

            const hitsPipe = (pipe) => {
                const left = birdX() - playerWidth * 0.36;
                const right = birdX() + playerWidth * 0.36;
                const pipeLeft = pipe.x;
                const pipeRight = pipe.x + pipeWidth;
                if (right <= pipeLeft || left >= pipeRight) {
                    return false;
                }
                const birdTop = playerY - playerHeight * 0.34;
                const birdBottom = playerY + playerHeight * 0.34;
                return birdTop < pipe.gapTop || birdBottom > pipe.gapTop + pipe.gap;
            };

            const updateGame = (timestamp) => {
                if (state !== 'playing') {
                    return;
                }
                const delta = Math.min((timestamp - previousFrame) / 1000, 0.032);
                previousFrame = timestamp;
                const height = fieldHeight();
                velocity += gravity * delta;
                playerY += velocity * delta;
                setPlayerPosition();

                if (playerY - playerHeight / 2 <= 0 || playerY + playerHeight / 2 >= height) {
                    endGame();
                    return;
                }

                spawnTimer += delta;
                if (spawnTimer >= spawnInterval) {
                    spawnTimer = 0;
                    addPipePair();
                }

                const remainingPipes = [];
                for (const pipe of pipes) {
                    pipe.x -= pipeSpeed * delta;
                    pipe.top.style.transform = `translateX(${pipe.x}px)`;
                    pipe.bottom.style.transform = `translateX(${pipe.x}px)`;
                    if (hitsPipe(pipe)) {
                        endGame();
                        return;
                    }
                    if (!pipe.scored && pipe.x + pipeWidth < birdX()) {
                        pipe.scored = true;
                        updateScore(score + 1);
                    }
                    if (pipe.x > -pipeWidth) {
                        remainingPipes.push(pipe);
                    } else {
                        pipe.top.remove();
                        pipe.bottom.remove();
                    }
                }
                pipes = remainingPipes;
                animationFrame = requestAnimationFrame(updateGame);
            };

            gameButton.addEventListener('click', () => {
                if (state === 'over') {
                    resetGame();
                }
                flap();
            });
            world.addEventListener('pointerdown', (event) => {
                if (event.target.closest('button')) {
                    return;
                }
                event.preventDefault();
                flap();
            });
            document.addEventListener('keydown', (event) => {
                if (event.code === 'Space' || event.code === 'ArrowUp') {
                    event.preventDefault();
                    flap();
                }
            });
            window.addEventListener('resize', () => {
                if (state !== 'playing') {
                    playerY = Math.min(playerY, fieldHeight() - playerHeight);
                    setPlayerPosition();
                }
            });

            resetGame();
        })();
    </script>
</body>
</html>
