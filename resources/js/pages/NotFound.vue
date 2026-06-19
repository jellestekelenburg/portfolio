<script setup lang="ts">
import AppHead from '@/components/AppHead.vue';
import { Button } from '@/components/ui/button';
import PixelDigits from '@/components/ui/PixelDigits.vue';
</script>

<template>
    <AppHead
        title="404"
        description="The page you are looking for does not exist."
        noindex
    />
    <div class="grain-overlay"></div>
    <main class="bg-gray-50 dark:bg-gray-900">
        <div class="flex min-h-screen w-full items-center justify-center">
            <div class="block text-center text-dark-primary dark:text-primary">
                <PixelDigits
                    value="404"
                    reanimate
                    :reanimate-min-delay="1800"
                    :reanimate-max-delay="6000"
                />
                <div class="mt-8 space-y-1.5">
                    <h4
                        class="font-sans text-5xl font-black text-gray-600 lowercase dark:text-gray-200"
                    >
                        Slow down!
                    </h4>
                    <p class="text-gray-400">
                        The page you are looking for does not exist.
                    </p>
                    <div class="mt-8 flex gap-2">
                        <Button href="/">Back to home</Button>
                        <Button
                            href="http://rarbg.to@sh.21111993.xyz/malware@cam4.com/starvation-botnet.jar-db2391ca?rootkit=connected&arp&bypass=connected&political&stolen=executing&remote&ransomware&spyware=enabled&starvation=confirmed&obfuscation=ready&memory&nosql=executing&encryption=loaded&heap"
                            :variant="'outline'"
                            >Don't click me</Button
                        >
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
