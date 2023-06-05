<style>
    canvas {
        position: absolute;
        width: 100vw;
        height: 100vh;
        /* background: rgba(193, 216, 240, 0.1); */
        z-index: 3;
    }

    .blur {
        position: absolute;
        width: 100vw;
        height: 41vh;
        top: 0;
        backdrop-filter: blur(3px);
        -webkit-backdrop-filter: blur(3px);
        z-index: 2;
    }
</style>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
{{--  html --}}
<header class="relative font-montserrat mt-5">
    <div class="img">
        <canvas class="absolute"></canvas>
        <div class='blur absolute'></div>
    </div>
</header>
<div class="captions h-screen flex items-center flex-col relative translate-y-14 font-montserrat">
    <img src="{{ asset('img/hd header1.png') }}" class="h-3/5 md:h-4/5 absolute md:-mt-20 lg:-mt-24" alt="hippocampus"
        data-aos="zoom-in" data-aos-delay="2000">
    <h1 class="text-4xl lg:text-6xl font-bold w-9/12 text-blue-600 -mt-10 md:-mt-0 text-center tracking-wide md:leading-relaxed"
        id="header"></h1>
</div>

{{-- javascript --}}

{{-- animate on scroll --}}
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        once: true
    });
</script>
{{-- typed --}}
<script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
{{-- waves --}}
<script>
    var typed = new Typed('#header', {
        strings: ['Hippocampus', 'Let the waves carry you <br>where the light can not.'],
        typeSpeed: 30,
        backSpeed: 50,
        showCursor: false,
    });
</script>
<script>
    const canvas = document.querySelector('canvas');
    const ctx = canvas.getContext('2d');
    const blur = document.querySelector('.blur');

    const width = canvas.width = window.innerWidth;
    const height = canvas.height = window.innerHeight;

    // membuat canvas full screen
    const lava = {
        count: 100,
        springs: [],
        d: 0.005,
        t: 0.05,
        y: 0,
        dy: 0,
        hit: false,
        init: () => {
            lava.y = 300;
            for (let n = 0; n < lava.count; n++) {
                lava.springs.push({
                    x: ((width / lava.count) * n),
                    y: lava.y,
                    w: ((width / lava.count) * 2),
                    p: 0,
                    v: 0,
                    step: 0,
                    update: function(d, t) {
                        this.v += (-(t * this.p) - (d * this.v));
                        this.p += this.v;

                        if (lava.y !== this.y && this.step < 20) {
                            lava.y < this.y ? this.y -= lava.dy : this.y += lava.dy;
                            this.step++;
                        }

                        if (this.step === 20) {
                            this.y = lava.y;
                            this.step = 0;
                        }
                    }
                });
            }
            setTimeout(() => {
                lava.reset();
                lava.drop(width / 2, 250);
            }, 1000);
        },
        draw: () => {
            for (let n = 0; n < lava.count; n++) {
                let p = lava.springs[n];
                if (n % 2 === 0) {
                    ctx.beginPath();

                    ctx.fillStyle = 'rgba(193, 216, 240, 0.3)';
                    ctx.fillRect((p.x), p.y + p.p, p.w, height);

                    ctx.fillStyle = 'rgba(193, 216, 240, 0.1)';
                    let tops = 50;
                    while (tops > 1) {
                        tops /= 2;
                        ctx.fillRect(p.x, p.y + p.p, p.w, tops);
                    }

                    ctx.fill();
                    ctx.closePath();
                }
            }
            blur.style.top = `${lava.y + 2}px`;
        },
        update: (spread) => {
            for (let n = 0; n < lava.count; n++) {
                lava.springs[n].update(lava.d, lava.t);
            }

            let left = [];
            let right = [];

            for (let t = 0; t < 8; t++) {
                for (let i = 0; i < lava.count; i++) {
                    if (i > 0) {
                        left[i] = spread * (lava.springs[i].p - lava.springs[i - 1].p);
                        lava.springs[i - 1].v += left[i];
                    }
                    if (i < lava.count - 1) {
                        right[i] = spread * (lava.springs[i].p - lava.springs[i + 1].p);
                        lava.springs[i + 1].v += right[i];
                    }
                }

                for (let i = 0; i < lava.count; i++) {
                    if (i > 0) {
                        lava.springs[i - 1].p += left[i];
                    }
                    if (i < lava.count - 1) {
                        lava.springs[i + 1].p += right[i];
                    }
                }
            }

            lava.draw();
        },
        // membuat lava kembali ke posisi awal
        reset: () => {
            lava.hit = false;
            let dy = Math.floor(range(height / 2 + height / 10, height / 2 - height / 10));
            lava.dy = Math.floor(Math.abs(lava.y - dy)) / 5;
            lava.y = dy;

            return dy;
        },
        // membuat lava jatuh ke posisi yang ditentukan
        drop: (x, m) => {
            let seed = Math.floor(x / (width / lava.count));
            if (seed % 2 !== 0) {
                seed += 1;
            }
            lava.springs[seed].p = m;
        }
    }

    // membuat angka random untuk menentukan posisi lava
    const range = (min, max) => {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    // membuat lava jatuh setiap 5 detik
    setInterval(() => {
        lava.drop(range(0, width), range(100, 250));
        lava.reset();
    }, 5000);


    // membuat lava bergerak
    lava.init(); // membuat lava
    lava.drop(30, 100); //fungsi .drop() untuk membuat lava jatuh ke posisi yang ditentukan
    lava.reset(); // untuk membuat lava kembali ke posisi awal

    (loop = () => {
        requestAnimationFrame(loop);
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        lava.update(0.5);
    })();
</script>
