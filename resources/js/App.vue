<script setup>
import { ref } from 'vue';

const isMenuOpen = ref(false);

function closeMenu() {
    isMenuOpen.value = false;
}
</script>

<template>
    <div class="min-h-screen overflow-hidden bg-[#f7f7f2] text-[#17251f]">
        <header class="relative z-20 mx-auto flex w-full max-w-7xl items-center justify-between px-5 py-5 sm:px-8 lg:px-10">
            <a class="flex items-center gap-3" href="#top" aria-label="Sveringhoy home" @click="closeMenu">
                <span class="grid size-10 place-items-center rounded-xl bg-[#1e493b] text-white shadow-sm">
                    <svg viewBox="0 0 24 24" class="size-5" fill="none" aria-hidden="true">
                        <path d="M5 17.5 12 5l7 12.5M8.2 12h7.6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                <span class="font-display text-[19px] font-semibold tracking-[-0.06em]">Sveringhoy</span>
            </a>

            <nav class="hidden items-center gap-9 text-[13px] font-medium text-[#59655d] md:flex" aria-label="Main navigation">
                <a class="transition hover:text-[#17251f]" href="#platform">Platform</a>
                <a class="transition hover:text-[#17251f]" href="#approach">Our approach</a>
                <a class="transition hover:text-[#17251f]" href="#contact">Contact</a>
            </nav>

            <div class="hidden items-center gap-5 md:flex">
                <a class="text-[13px] font-medium text-[#59655d] transition hover:text-[#17251f]" href="#platform">See how it works</a>
                <a class="inline-flex items-center gap-2 rounded-full bg-[#1e493b] px-5 py-3 text-[13px] font-semibold text-white transition hover:bg-[#28614e]" href="#contact">
                    Get started <span aria-hidden="true">↗</span>
                </a>
            </div>

            <button
                class="grid size-10 place-items-center rounded-full border border-[#dce2d9] text-[#1e493b] md:hidden"
                type="button"
                :aria-expanded="isMenuOpen"
                aria-controls="mobile-navigation"
                aria-label="Toggle navigation"
                @click="isMenuOpen = !isMenuOpen"
            >
                <svg v-if="!isMenuOpen" viewBox="0 0 24 24" class="size-5" fill="none" aria-hidden="true">
                    <path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />
                </svg>
                <svg v-else viewBox="0 0 24 24" class="size-5" fill="none" aria-hidden="true">
                    <path d="m6 6 12 12M18 6 6 18" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />
                </svg>
            </button>
        </header>

        <nav v-if="isMenuOpen" id="mobile-navigation" class="relative z-20 mx-5 mb-3 grid gap-1 rounded-2xl border border-[#e4e8e0] bg-white p-3 shadow-xl md:hidden" aria-label="Mobile navigation">
            <a class="rounded-xl px-4 py-3 text-sm text-[#59655d] hover:bg-[#f5f6f1]" href="#platform" @click="closeMenu">Platform</a>
            <a class="rounded-xl px-4 py-3 text-sm text-[#59655d] hover:bg-[#f5f6f1]" href="#approach" @click="closeMenu">Our approach</a>
            <a class="rounded-xl px-4 py-3 text-sm text-[#59655d] hover:bg-[#f5f6f1]" href="#contact" @click="closeMenu">Contact</a>
            <a class="mt-1 rounded-xl bg-[#1e493b] px-4 py-3 text-center text-sm font-semibold text-white" href="#contact" @click="closeMenu">Get started ↗</a>
        </nav>

        <main id="top">
            <section class="mx-auto grid w-full max-w-7xl items-center gap-14 px-5 pb-20 pt-14 sm:px-8 sm:pt-20 lg:grid-cols-[0.92fr_1.08fr] lg:gap-10 lg:px-10 lg:pb-28 lg:pt-20">
                <div class="relative z-10 max-w-xl">
                    <p class="mb-7 inline-flex items-center gap-2 rounded-full border border-[#dce5d9] bg-white/70 px-3.5 py-2 text-[11px] font-semibold uppercase tracking-[0.14em] text-[#416b57]">
                        <span class="size-1.5 rounded-full bg-[#6c9b72]"></span> A calmer way to work
                    </p>
                    <h1 class="font-display text-[clamp(3.35rem,7vw,6.4rem)] font-medium leading-[0.96] tracking-[-0.075em] text-[#17251f]">
                        Make room<br class="hidden sm:block"> for <span class="text-[#789575]">good work.</span>
                    </h1>
                    <p class="mt-7 max-w-lg text-[16px] leading-7 text-[#69756c] sm:text-[17px] sm:leading-8">
                        Bring your plans, people, and progress into one clear space. Less busywork, more momentum on what matters.
                    </p>
                    <div class="mt-9 flex flex-col gap-3 sm:flex-row sm:items-center">
                        <a class="inline-flex min-h-12 items-center justify-center gap-4 rounded-full bg-[#1e493b] px-6 text-[13px] font-semibold text-white shadow-[0_8px_18px_rgba(30,73,59,0.14)] transition hover:-translate-y-0.5 hover:bg-[#28614e]" href="#contact">
                            Start your workspace <span aria-hidden="true">↗</span>
                        </a>
                        <a class="inline-flex min-h-12 items-center justify-center gap-2 rounded-full px-5 text-[13px] font-semibold text-[#46564c] transition hover:bg-white" href="#platform">
                            Discover the platform <span aria-hidden="true">↓</span>
                        </a>
                    </div>
                    <div class="mt-12 flex items-center gap-4 border-t border-[#dfe4dc] pt-6">
                        <div class="flex -space-x-2" aria-hidden="true">
                            <span class="grid size-8 place-items-center rounded-full border-2 border-[#f7f7f2] bg-[#d6a184] text-[10px] font-semibold text-white">A</span>
                            <span class="grid size-8 place-items-center rounded-full border-2 border-[#f7f7f2] bg-[#718f7b] text-[10px] font-semibold text-white">M</span>
                            <span class="grid size-8 place-items-center rounded-full border-2 border-[#f7f7f2] bg-[#d3ba78] text-[10px] font-semibold text-white">J</span>
                        </div>
                        <p class="text-xs leading-5 text-[#748077]"><span class="font-semibold text-[#33453a]">Thoughtful by design.</span><br>Built for teams that value focus.</p>
                    </div>
                </div>

                <div class="preview-scene relative mx-auto w-full max-w-[620px] lg:ml-auto">
                    <div class="preview-orbit orbit-one"></div>
                    <div class="preview-orbit orbit-two"></div>
                    <div class="absolute -left-1 top-[16%] z-10 hidden rounded-2xl border border-white/80 bg-white/90 p-4 shadow-[0_18px_50px_rgba(39,62,47,0.13)] backdrop-blur sm:block">
                        <div class="flex items-center gap-3">
                            <span class="grid size-9 place-items-center rounded-xl bg-[#f2e8d5] text-[#98774a]">
                                <svg viewBox="0 0 24 24" class="size-[18px]" fill="none" aria-hidden="true"><path d="m12 3 1.9 5.8L20 11l-6.1 2.2L12 19l-2-5.8L4 11l6-2.2L12 3Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="m19 16 .9 2.2L22 19l-2.1.8L19 22l-.8-2.2L16 19l2.2-.8L19 16Z" fill="currentColor"/></svg>
                            </span>
                            <span><span class="block text-[11px] text-[#7b847c]">A little more focus</span><span class="mt-0.5 block text-sm font-semibold text-[#26382d]">Your week, in view</span></span>
                        </div>
                    </div>

                    <div class="dashboard-card relative z-[1] overflow-hidden rounded-[24px] border border-white/80 bg-white/90 p-4 shadow-[0_34px_90px_rgba(38,66,47,0.14)] backdrop-blur sm:rounded-[28px] sm:p-6">
                        <div class="flex items-center justify-between border-b border-[#edf0ea] pb-4">
                            <div class="flex items-center gap-2.5">
                                <span class="grid size-8 place-items-center rounded-[10px] bg-[#e6eee5] text-[#426a50]">
                                    <svg viewBox="0 0 24 24" class="size-4" fill="none" aria-hidden="true"><path d="M5 17.5 12 5l7 12.5M8.2 12h7.6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </span>
                                <span class="text-xs font-semibold tracking-tight text-[#33453a]">Workspace</span>
                            </div>
                            <div class="flex items-center gap-1.5"><span class="size-1.5 rounded-full bg-[#d6ddd5]"></span><span class="size-1.5 rounded-full bg-[#d6ddd5]"></span><span class="size-1.5 rounded-full bg-[#d6ddd5]"></span></div>
                        </div>

                        <div class="grid gap-5 pt-5 sm:grid-cols-[1fr_150px]">
                            <div>
                                <div class="flex items-start justify-between gap-3">
                                    <div><p class="text-[10px] font-semibold uppercase tracking-[0.13em] text-[#8a958b]">Monday, October 26</p><h2 class="mt-1.5 font-display text-[22px] font-medium tracking-[-0.055em] text-[#26382d] sm:text-[25px]">Good morning, Alex</h2></div>
                                    <span class="grid size-8 shrink-0 place-items-center rounded-full bg-[#f1e2d6] text-[10px] font-semibold text-[#966749]">A</span>
                                </div>
                                <div class="mt-5 rounded-2xl bg-[#f6f7f3] p-4">
                                    <div class="flex items-center justify-between"><span class="text-[11px] font-semibold text-[#3e5043]">This week</span><span class="rounded-full bg-white px-2.5 py-1 text-[9px] font-medium text-[#748177]">Oct 26 – 30</span></div>
                                    <div class="mt-4 grid grid-cols-5 gap-2 text-center">
                                        <div v-for="(day, index) in ['M', 'T', 'W', 'T', 'F']" :key="`${day}-${index}`" class="rounded-xl py-2" :class="index === 2 ? 'bg-[#dce8dc]' : ''"><span class="block text-[9px] text-[#8a958b]">{{ day }}</span><span class="mt-1.5 block text-[11px] font-semibold" :class="index === 2 ? 'text-[#315b40]' : 'text-[#58645a]'">{{ 26 + index }}</span><span class="mx-auto mt-2 block size-1 rounded-full" :class="index === 2 ? 'bg-[#719675]' : 'bg-transparent'"></span></div>
                                    </div>
                                </div>
                                <div class="mt-4 flex items-center justify-between"><span class="text-[11px] font-semibold text-[#3e5043]">Your priorities</span><span class="text-[10px] text-[#8a958b]">2 of 3 done</span></div>
                                <div class="mt-3 grid gap-2">
                                    <div class="flex items-center gap-2.5 rounded-xl border border-[#edf0ea] px-3 py-2.5"><span class="grid size-4 place-items-center rounded-full bg-[#dce9dc] text-[9px] text-[#426b4a]">✓</span><span class="flex-1 text-[10px] text-[#7c877e] line-through">Review the project plan</span><span class="size-1.5 rounded-full bg-[#97b28d]"></span></div>
                                    <div class="flex items-center gap-2.5 rounded-xl border border-[#edf0ea] px-3 py-2.5"><span class="size-4 rounded-full border border-[#d8dfd6]"></span><span class="flex-1 text-[10px] font-medium text-[#526054]">Share the first concept</span><span class="size-1.5 rounded-full bg-[#dfb87e]"></span></div>
                                </div>
                            </div>

                            <aside class="hidden rounded-2xl bg-[#f5f6f2] p-4 sm:block">
                                <p class="text-[10px] font-semibold text-[#536257]">Your momentum</p>
                                <p class="mt-4 font-display text-3xl tracking-[-0.06em] text-[#26382d]">Steady<span class="ml-1 text-[#8fa58d]">↗</span></p>
                                <p class="mt-1 text-[9px] text-[#89948b]">A good pace this week</p>
                                <svg viewBox="0 0 150 78" class="mt-5 w-full overflow-visible" fill="none" aria-label="A rising progress line">
                                    <path d="M2 64C16 59 18 58 28 61c10 3 15-19 27-16s14 12 24 5 15-24 26-18 14 7 23-5 13-9 20-19" stroke="#759779" stroke-width="2.5" stroke-linecap="round" />
                                    <path d="M2 64C16 59 18 58 28 61c10 3 15-19 27-16s14 12 24 5 15-24 26-18 14 7 23-5 13-9 20-19V78H2V64Z" fill="url(#chartFill)" opacity=".45" />
                                    <path d="M1 77H150" stroke="#dfe5dc" stroke-width="1" />
                                    <defs><linearGradient id="chartFill" x1="76" y1="8" x2="76" y2="78" gradientUnits="userSpaceOnUse"><stop stop-color="#bdd0b8"/><stop offset="1" stop-color="#eff4eb" stop-opacity="0"/></linearGradient></defs>
                                </svg>
                                <div class="mt-4 border-t border-[#e5e9e1] pt-4"><p class="text-[9px] text-[#8a958b]">One thing at a time</p><p class="mt-1 text-[10px] font-medium leading-4 text-[#506052]">Your next step is right where you left it.</p></div>
                            </aside>
                        </div>
                        <div class="mt-5 flex items-center justify-between rounded-xl bg-[#f8f8f5] px-3.5 py-3">
                            <div class="flex items-center gap-2.5"><span class="grid size-7 place-items-center rounded-full bg-[#efe4d0] text-[10px] text-[#8c7046]">✦</span><span class="text-[10px] text-[#667268]">Take a breath. You’re right on track.</span></div><span class="text-[10px] text-[#789575]">•</span>
                        </div>
                    </div>

                    <div class="absolute -bottom-5 -right-1 z-10 hidden rounded-2xl border border-white/80 bg-white/95 px-4 py-3 shadow-[0_18px_50px_rgba(39,62,47,0.12)] backdrop-blur sm:block">
                        <div class="flex items-center gap-2.5"><span class="grid size-8 place-items-center rounded-full bg-[#e6eee5] text-[#52765c]">✓</span><span><span class="block text-[10px] text-[#8a958b]">Small steps add up</span><span class="mt-0.5 block text-[12px] font-semibold text-[#33453a]">Progress, not pressure</span></span></div>
                    </div>
                </div>
            </section>

            <section id="platform" class="border-y border-[#e3e7df] bg-white/65">
                <div class="mx-auto grid w-full max-w-7xl gap-12 px-5 py-20 sm:px-8 lg:grid-cols-[0.8fr_1.2fr] lg:gap-24 lg:px-10 lg:py-28">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.15em] text-[#789575]">A little more clarity</p>
                        <h2 class="mt-5 max-w-md font-display text-4xl font-medium leading-[1.05] tracking-[-0.065em] text-[#1e3127] sm:text-5xl">Good work starts with a clear head.</h2>
                    </div>
                    <div class="grid gap-8 sm:grid-cols-2 sm:gap-10">
                        <article class="border-t border-[#dfe5dc] pt-5">
                            <span class="grid size-10 place-items-center rounded-xl bg-[#e8efe6] text-[#57785b]"><svg viewBox="0 0 24 24" class="size-[19px]" fill="none" aria-hidden="true"><path d="M5 5.5h14v13H5zM8 9h8M8 12h5M8 15h7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                            <h3 class="mt-5 text-[15px] font-semibold tracking-tight text-[#2a3b30]">See what matters</h3>
                            <p class="mt-2 text-[13px] leading-6 text-[#748077]">Keep the important work in sight. Turn a long list into a few clear next steps.</p>
                        </article>
                        <article class="border-t border-[#dfe5dc] pt-5">
                            <span class="grid size-10 place-items-center rounded-xl bg-[#f3eadc] text-[#a28252]"><svg viewBox="0 0 24 24" class="size-[19px]" fill="none" aria-hidden="true"><path d="M16 20v-1.5a3.5 3.5 0 0 0-3.5-3.5h-5A3.5 3.5 0 0 0 4 18.5V20M10 11a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7ZM16 4.5a3.5 3.5 0 0 1 0 6.8M16.5 15h.5a3.5 3.5 0 0 1 3 1.7V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg></span>
                            <h3 class="mt-5 text-[15px] font-semibold tracking-tight text-[#2a3b30]">Move together</h3>
                            <p class="mt-2 text-[13px] leading-6 text-[#748077]">Give everyone the same picture of the work, without adding another layer of noise.</p>
                        </article>
                        <article id="approach" class="border-t border-[#dfe5dc] pt-5">
                            <span class="grid size-10 place-items-center rounded-xl bg-[#e8eee9] text-[#5f816e]"><svg viewBox="0 0 24 24" class="size-[19px]" fill="none" aria-hidden="true"><path d="M12 3v18M5 9h14M5 15h14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><circle cx="12" cy="9" r="2" fill="white" stroke="currentColor" stroke-width="1.5"/><circle cx="8" cy="15" r="2" fill="white" stroke="currentColor" stroke-width="1.5"/></svg></span>
                            <h3 class="mt-5 text-[15px] font-semibold tracking-tight text-[#2a3b30]">Find your rhythm</h3>
                            <p class="mt-2 text-[13px] leading-6 text-[#748077]">Shape a workflow that fits the way you think, plan, and bring good ideas to life.</p>
                        </article>
                        <article class="border-t border-[#dfe5dc] pt-5">
                            <span class="grid size-10 place-items-center rounded-xl bg-[#f2e9e4] text-[#a1735a]"><svg viewBox="0 0 24 24" class="size-[19px]" fill="none" aria-hidden="true"><path d="M12 3.5 14.2 9l5.8 2-5.8 2.1L12 19l-2.2-5.9L4 11l5.8-2L12 3.5Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="m19 16 .8 2.2L22 19l-2.2.8L19 22l-.8-2.2L16 19l2.2-.8L19 16Z" fill="currentColor"/></svg></span>
                            <h3 class="mt-5 text-[15px] font-semibold tracking-tight text-[#2a3b30]">Leave space for ideas</h3>
                            <p class="mt-2 text-[13px] leading-6 text-[#748077]">A quieter way to organize your day makes room for the thinking behind the work.</p>
                        </article>
                    </div>
                </div>
            </section>

            <section id="contact" class="mx-auto w-full max-w-7xl px-5 py-20 sm:px-8 lg:px-10 lg:py-28">
                <div class="relative overflow-hidden rounded-[28px] bg-[#1e493b] px-7 py-12 text-white sm:px-12 sm:py-16 lg:px-16">
                    <div class="cta-glow" aria-hidden="true"></div>
                    <div class="relative z-10 flex flex-col justify-between gap-8 md:flex-row md:items-end">
                        <div class="max-w-xl"><p class="text-[11px] font-semibold uppercase tracking-[0.15em] text-[#b9cfb5]">Start with what matters</p><h2 class="mt-4 font-display text-4xl font-medium leading-[1.02] tracking-[-0.06em] sm:text-5xl">A clearer day is closer than you think.</h2><p class="mt-4 max-w-md text-sm leading-6 text-white/65">Give your ideas a home and your work a little more breathing room.</p></div>
                        <a class="inline-flex min-h-12 shrink-0 items-center justify-center gap-5 rounded-full bg-[#f5f5ed] px-6 text-[13px] font-semibold text-[#1e493b] transition hover:-translate-y-0.5 hover:bg-white" href="#platform">Explore the platform <span aria-hidden="true">↗</span></a>
                    </div>
                </div>
            </section>
        </main>

        <footer class="mx-auto flex w-full max-w-7xl flex-col gap-5 border-t border-[#e1e6de] px-5 py-7 text-[11px] text-[#7b867d] sm:flex-row sm:items-center sm:justify-between sm:px-8 lg:px-10">
            <a class="flex items-center gap-2.5 font-semibold text-[#384b3e]" href="#top"><span class="grid size-7 place-items-center rounded-lg bg-[#1e493b] text-white"><svg viewBox="0 0 24 24" class="size-4" fill="none" aria-hidden="true"><path d="M5 17.5 12 5l7 12.5M8.2 12h7.6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Sveringhoy</a>
            <p>Make room for good work.</p>
            <p>© {{ new Date().getFullYear() }} Sveringhoy. All rights reserved.</p>
        </footer>
    </div>
</template>
