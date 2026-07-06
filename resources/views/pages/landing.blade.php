<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'CuniApp Élevage') }} - Gestion intelligente de votre cheptel lapin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --primary: #2563EB;
            --primary-light: #3B82F6;
            --primary-dark: #1D4ED8;
            --primary-subtle: #EFF6FF;
            --accent-cyan: #06B6D4;
            --accent-purple: #8B5CF6;
            --accent-pink: #EC4899;
            --accent-green: #10B981;
            --accent-orange: #F59E0B;
            --accent-red: #EF4444;
            --white: #FFFFFF;
            --gray-50: #F9FAFB;
            --gray-100: #F3F4F6;
            --gray-200: #E5E7EB;
            --gray-300: #D1D5DB;
            --gray-400: #9CA3AF;
            --gray-500: #6B7280;
            --gray-600: #4B5563;
            --gray-700: #374151;
            --gray-800: #1F2937;
            --gray-900: #111827;
            --surface: #FFFFFF;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
            --radius: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 20px;
            --radius-2xl: 24px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--gray-50);
            color: var(--gray-800);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* ==================== ANIMATIONS ==================== */
        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(2deg);
            }
        }

        @keyframes slideInRight {
            0% {
                opacity: 0;
                transform: translateX(30px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes bounceSubtle {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float 6s ease-in-out infinite;
            animation-delay: -3s;
        }

        .animate-bounce-subtle {
            animation: bounceSubtle 2s ease-in-out infinite;
        }

        .animate-fade-in {
            animation: fadeIn 0.4s ease-out;
        }

        .animate-slide-up {
            animation: fadeInUp 0.3s ease-out;
        }

        .animate-pulse-slow {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* ==================== NAVBAR ==================== */
        .landing-nav {
            position: sticky;
            top: 0;
            z-index: 50;
            transition: all 0.5s ease;
        }

        .landing-nav.scrolled {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(37, 99, 235, 0.1);
            box-shadow: 0 4px 30px rgba(37, 99, 235, 0.06);
        }

        .nav-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .nav-logo {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .nav-logo svg {
            width: 22px;
            height: 22px;
        }

        .nav-brand-text {
            font-size: 20px;
            font-weight: 700;
            color: var(--gray-800);
            letter-spacing: -0.02em;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .nav-link {
            font-size: 14px;
            font-weight: 500;
            color: var(--gray-600);
            text-decoration: none;
            padding: 8px 16px;
            border-radius: var(--radius);
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary);
            background: rgba(37, 99, 235, 0.05);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn-nav-login {
            font-size: 14px;
            font-weight: 500;
            color: var(--gray-600);
            text-decoration: none;
            padding: 8px 12px;
            transition: color 0.3s ease;
        }

        .btn-nav-login:hover {
            color: var(--primary);
        }

        .btn-nav-cta {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 600;
            color: var(--white);
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border: none;
            border-radius: var(--radius);
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .btn-nav-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4);
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
        }

        /* ==================== HERO SECTION ==================== */
        .hero-section {
            position: relative;
            overflow: hidden;
            isolation: isolate;
        }

        .hero-bg {
            position: fixed;
            inset: 0;
            z-index: -10;
        }

        .hero-bg-gradient {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.08) 0%, rgba(6, 182, 212, 0.05) 50%, rgba(59, 130, 246, 0.08) 100%);
        }

        .hero-bg-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.12) 0%, transparent 50%, rgba(6, 182, 212, 0.08) 100%);
        }

        .hero-particles {
            position: absolute;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.15;
            pointer-events: none;
        }

        .hero-svg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            opacity: 0.08;
        }

        .hero-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 80px 24px 120px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 64px;
            align-items: center;
        }

        @media (max-width: 1024px) {
            .hero-content {
                grid-template-columns: 1fr;
                padding: 60px 24px 80px;
                text-align: center;
            }
        }

        .hero-left {
            transition: all 0.7s ease;
            transition-delay: 200ms;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(37, 99, 235, 0.1);
            border: 1px solid rgba(37, 99, 235, 0.2);
            border-radius: 100px;
            padding: 8px 16px;
            margin-bottom: 24px;
            backdrop-filter: blur(10px);
        }

        .hero-badge-dot {
            width: 8px;
            height: 8px;
            background: var(--primary);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        .hero-badge-text {
            font-size: 12px;
            font-weight: 600;
            color: var(--primary);
        }

        .hero-title {
            font-size: 56px;
            font-weight: 700;
            color: var(--gray-800);
            line-height: 1.1;
            letter-spacing: -0.02em;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 36px;
            }
        }

        .hero-gradient-text {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent-cyan) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-description {
            font-size: 18px;
            color: var(--gray-500);
            max-width: 520px;
            line-height: 1.7;
            margin-bottom: 32px;
        }

        @media (max-width: 1024px) {
            .hero-description {
                margin: 0 auto 32px;
            }
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
        }

        @media (max-width: 1024px) {
            .hero-buttons {
                justify-content: center;
            }
        }

        .btn-hero-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 16px 28px;
            font-size: 16px;
            font-weight: 600;
            color: var(--white);
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border: none;
            border-radius: var(--radius-lg);
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .btn-hero-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(37, 99, 235, 0.4);
        }

        .btn-hero-primary i {
            transition: transform 0.3s ease;
        }

        .btn-hero-primary:hover i {
            transform: translateX(4px);
        }

        .btn-hero-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 16px 28px;
            font-size: 16px;
            font-weight: 600;
            color: var(--gray-700);
            background: transparent;
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-lg);
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-hero-secondary:hover {
            border-color: var(--primary);
            color: var(--primary);
            background: rgba(37, 99, 235, 0.05);
        }

        .hero-trust {
            display: flex;
            align-items: center;
            gap: 24px;
            margin-top: 32px;
        }

        @media (max-width: 1024px) {
            .hero-trust {
                justify-content: center;
            }
        }

        .hero-trust-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: var(--gray-500);
        }

        .hero-trust-item i {
            font-size: 16px;
        }

        .hero-trust-item .icon-green {
            color: var(--accent-green);
        }

        .hero-trust-item .icon-orange {
            color: var(--accent-orange);
        }

        /* Hero Right - Illustration */
        .hero-right {
            position: relative;
            transition: all 0.7s ease;
            transition-delay: 500ms;
        }

        .hero-illustration {
            position: relative;
        }

        .hero-illustration-bg {
            position: absolute;
            top: -40px;
            right: -40px;
            width: 160px;
            height: 160px;
            background: rgba(37, 99, 235, 0.1);
            border-radius: 50%;
            filter: blur(60px);
        }

        .hero-illustration-bg-2 {
            position: absolute;
            bottom: -40px;
            left: -40px;
            width: 192px;
            height: 192px;
            background: rgba(59, 130, 246, 0.1);
            border-radius: 50%;
            filter: blur(60px);
        }

        .hero-card {
            position: relative;
            background: rgba(255, 255, 255, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: var(--radius-2xl);
            padding: 32px;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 12px 48px rgba(0, 0, 0, 0.1), 0 4px 16px rgba(37, 99, 235, 0.08);
            animation: bounceSubtle 2s ease-in-out infinite;
        }

        .hero-card-content {
            aspect-ratio: 4/3;
            border-radius: var(--radius-xl);
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(to bottom right, rgba(37, 99, 235, 0.05), rgba(6, 182, 212, 0.1));
        }

        .hero-card-icon {
            width: 96px;
            height: 96px;
            background: rgba(37, 99, 235, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-card-icon i {
            font-size: 48px;
            color: var(--primary);
        }

        .hero-card-text {
            text-align: center;
            margin-top: 16px;
        }

        .hero-card-text p {
            font-size: 16px;
            font-weight: 500;
            color: var(--gray-600);
        }

        /* Floating Stats */
        .hero-float-stat {
            position: absolute;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: var(--radius-lg);
            padding: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            border: 1px solid rgba(255, 255, 255, 0.4);
            background: rgba(255, 255, 255, 0.7);
            box-shadow: 0 12px 48px rgba(0, 0, 0, 0.1);
        }

        .hero-float-stat-left {
            left: -48px;
            top: 25%;
        }

        .hero-float-stat-right {
            right: -32px;
            bottom: 25%;
        }

        @media (max-width: 1024px) {
            .hero-float-stat {
                display: none;
            }
        }

        .float-stat-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .float-stat-icon.green {
            background: rgba(16, 185, 129, 0.15);
        }

        .float-stat-icon.green i {
            color: var(--accent-green);
            font-size: 20px;
        }

        .float-stat-icon.blue {
            background: rgba(37, 99, 235, 0.15);
        }

        .float-stat-icon.blue i {
            color: var(--primary);
            font-size: 20px;
        }

        .float-stat-label {
            font-size: 12px;
            color: var(--gray-400);
        }

        .float-stat-value {
            font-size: 18px;
            font-weight: 700;
            color: var(--gray-800);
        }

        /* ==================== SECTION DIVIDER ==================== */
        .section-divider {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 8px 0;
        }

        .section-divider-line {
            width: 64px;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(37, 99, 235, 0.2), transparent);
        }

        /* ==================== FEATURES SECTION ==================== */
        .features-section {
            position: relative;
            max-width: 1280px;
            margin: 0 auto;
            padding: 96px 24px;
            border-radius: var(--radius-2xl);
            overflow: hidden;
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.04) 0%, rgba(249, 250, 251, 0.8) 100%);
        }

        @media (max-width: 1024px) {
            .features-section {
                margin: 0 24px;
            }
        }

        .features-bubbles {
            position: absolute;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .features-glow {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 600px;
            height: 300px;
            background: rgba(37, 99, 235, 0.04);
            border-radius: 50%;
            filter: blur(60px);
            pointer-events: none;
        }

        .section-header {
            text-align: center;
            margin-bottom: 64px;
            position: relative;
        }

        .section-badge {
            font-size: 12px;
            font-weight: 600;
            color: var(--primary);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 12px;
            display: block;
        }

        .section-title {
            font-size: 36px;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 16px;
        }

        @media (max-width: 768px) {
            .section-title {
                font-size: 28px;
            }
        }

        .section-description {
            font-size: 16px;
            color: var(--gray-500);
            max-width: 640px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            position: relative;
        }

        @media (max-width: 1024px) {
            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 640px) {
            .features-grid {
                grid-template-columns: 1fr;
            }
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(37, 99, 235, 0.08);
            border-radius: var(--radius-lg);
            padding: 24px;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 48px rgba(0, 0, 0, 0.1);
            border-color: rgba(37, 99, 235, 0.15);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            background: rgba(37, 99, 235, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            transition: background 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            background: rgba(37, 99, 235, 0.15);
        }

        .feature-icon i {
            font-size: 24px;
            color: var(--primary);
        }

        .feature-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 8px;
        }

        .feature-description {
            font-size: 14px;
            color: var(--gray-500);
            line-height: 1.6;
        }

        /* ==================== PRICING SECTION ==================== */
        .pricing-section {
            position: relative;
            max-width: 1280px;
            margin: 0 auto;
            padding: 96px 24px;
            border-radius: var(--radius-2xl);
            overflow: hidden;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.6) 0%, rgba(37, 99, 235, 0.05) 100%);
        }

        @media (max-width: 1024px) {
            .pricing-section {
                margin: 0 24px;
            }
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            position: relative;
        }

        @media (max-width: 1280px) {
            .pricing-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .pricing-grid {
                grid-template-columns: 1fr;
                max-width: 400px;
                margin: 0 auto;
            }
        }

        .pricing-card {
            border-radius: var(--radius-lg);
            padding: 24px;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            position: relative;
        }

        .pricing-card:hover {
            transform: translateY(-4px);
        }

        .pricing-card.popular {
            border: 2px solid var(--primary);
            background: rgba(37, 99, 235, 0.04);
            box-shadow: 0 12px 48px rgba(0, 0, 0, 0.1);
        }

        .pricing-card:not(.popular) {
            border: 1px solid rgba(37, 99, 235, 0.08);
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .pricing-card:not(.popular):hover {
            box-shadow: 0 12px 48px rgba(0, 0, 0, 0.1);
            border-color: rgba(37, 99, 235, 0.15);
        }

        .pricing-popular-badge {
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            font-size: 12px;
            font-weight: 700;
            padding: 4px 16px;
            border-radius: 100px;
            display: flex;
            align-items: center;
            gap: 4px;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .pricing-popular-badge i {
            font-size: 12px;
        }

        .pricing-name {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .pricing-card.popular .pricing-name {
            color: var(--primary);
        }

        .pricing-card:not(.popular) .pricing-name {
            color: var(--gray-500);
        }

        .pricing-price {
            margin-bottom: 20px;
        }

        .pricing-amount {
            font-size: 32px;
            font-weight: 700;
            color: var(--gray-800);
        }

        .pricing-period {
            font-size: 14px;
            color: var(--gray-400);
            margin-left: 4px;
        }

        .pricing-features {
            list-style: none;
            padding: 0;
            margin: 0 0 24px 0;
            flex: 1;
        }

        .pricing-feature {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            padding: 8px 0;
            font-size: 14px;
            color: var(--gray-600);
        }

        .pricing-feature i {
            color: rgba(37, 99, 235, 0.6);
            font-size: 15px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .pricing-cta {
            display: block;
            text-align: center;
            padding: 10px 0;
            border-radius: var(--radius-md);
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            width: 100%;
        }

        .pricing-card.popular .pricing-cta {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
        }

        .pricing-card.popular .pricing-cta:hover {
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4);
            transform: scale(1.02);
        }

        .pricing-card:not(.popular) .pricing-cta {
            background: rgba(249, 250, 251, 0.8);
            border: 1px solid rgba(37, 99, 235, 0.1);
            color: var(--gray-700);
        }

        .pricing-card:not(.popular) .pricing-cta:hover {
            background: rgba(37, 99, 235, 0.05);
            border-color: rgba(37, 99, 235, 0.3);
            color: var(--primary);
        }

        /* ==================== CTA SECTION ==================== */
        .cta-section {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px 96px;
        }

        .cta-card {
            position: relative;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 50%, var(--primary-light) 100%);
            border-radius: var(--radius-2xl);
            padding: 64px;
            overflow: hidden;
        }

        @media (max-width: 768px) {
            .cta-card {
                padding: 48px 24px;
            }
        }

        .cta-bg-blob-1 {
            position: absolute;
            top: 0;
            right: 0;
            width: 288px;
            height: 288px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            filter: blur(60px);
            transform: translateY(-50%) translateX(33%);
        }

        .cta-bg-blob-2 {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 224px;
            height: 224px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            filter: blur(60px);
            transform: translateY(50%) translateX(-33%);
        }

        .cta-dots {
            position: absolute;
            inset: 0;
            opacity: 0.1;
        }

        .cta-content {
            position: relative;
            z-index: 10;
            text-align: center;
        }

        .cta-title {
            font-size: 36px;
            font-weight: 700;
            color: white;
            margin-bottom: 16px;
        }

        @media (max-width: 768px) {
            .cta-title {
                font-size: 28px;
            }
        }

        .cta-description {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.75);
            max-width: 640px;
            margin: 0 auto 32px;
            line-height: 1.7;
        }

        .cta-buttons {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 16px;
        }

        .btn-cta-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 16px 32px;
            font-size: 16px;
            font-weight: 600;
            color: var(--primary);
            background: white;
            border: none;
            border-radius: var(--radius-lg);
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-cta-primary:hover {
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .btn-cta-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 16px 32px;
            font-size: 16px;
            font-weight: 600;
            color: white;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--radius-lg);
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .btn-cta-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* ==================== FOOTER ==================== */
        .landing-footer {
            background: var(--gray-50);
            border-top: 1px solid var(--gray-200);
            padding: 48px 24px;
        }

        .footer-container {
            max-width: 1280px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .footer-logo {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .footer-logo svg {
            width: 18px;
            height: 18px;
        }

        .footer-brand-text {
            font-size: 16px;
            font-weight: 600;
            color: var(--gray-700);
        }

        .footer-copyright {
            font-size: 13px;
            color: var(--gray-400);
        }

        .footer-links {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .footer-link {
            font-size: 13px;
            color: var(--gray-500);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: var(--primary);
        }

        /* ==================== SECTION REVEAL ANIMATION ==================== */
        .section-reveal {
            opacity: 0;
            transform: translateY(32px);
            transition: all 0.7s ease;
        }

        .section-reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ==================== RESPONSIVE ==================== */
        @media (max-width: 640px) {
            .hero-content {
                padding: 40px 16px 60px;
            }

            .hero-title {
                font-size: 32px;
            }

            .hero-description {
                font-size: 16px;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .btn-hero-primary,
            .btn-hero-secondary {
                width: 100%;
                justify-content: center;
            }

            .features-section,
            .pricing-section {
                padding: 64px 16px;
            }

            .section-title {
                font-size: 24px;
            }

            .footer-container {
                flex-direction: column;
                text-align: center;
            }

            .footer-links {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <!-- ==================== NAVBAR ==================== -->
    <nav class="landing-nav" id="landingNav">
        <div class="nav-container">
            <a href="/" class="nav-brand">
                <div class="nav-logo">
                    <svg viewBox="0 0 40 40" fill="none">
                        <path d="M20 5L35 15V25L20 35L5 25V15L20 5Z" fill="white" />
                        <path d="M20 12L28 17V23L20 28L12 23V17L20 12Z" fill="rgba(255,255,255,0.8)" />
                    </svg>
                </div>
                <span class="nav-brand-text">CuniApp</span>
            </a>
            <div class="nav-links">
                <a href="#features" class="nav-link">Fonctionnalités</a>
                <a href="#pricing" class="nav-link">Tarifs</a>
            </div>
            <div class="nav-actions">
                <a href="{{ route('connect') }}" class="btn-nav-login">Connexion</a>
                <a href="{{ route('connect') }}#register" class="btn-nav-cta">
                    Commencer
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </nav>

    <!-- ==================== HERO ==================== -->
    <section class="hero-section">
        <!-- Background -->
        <div class="hero-bg">
            <div class="hero-bg-gradient"></div>
            <div class="hero-bg-overlay"></div>
        </div>

        <!-- Particles -->
        <div class="hero-particles">
            <div class="particle" style="width: 288px; height: 288px; background: rgba(37, 99, 235, 0.08); top: 25%; left: -144px;" class="animate-float"></div>
            <div class="particle" style="width: 384px; height: 384px; background: rgba(59, 130, 246, 0.06); top: -96px; right: 25%;" class="animate-float-delayed"></div>
            <div class="particle" style="width: 224px; height: 224px; background: rgba(37, 99, 235, 0.05); bottom: 25%; right: 33%;" class="animate-float"></div>
            <div class="particle" style="width: 320px; height: 320px; background: rgba(59, 130, 246, 0.04); bottom: 0; left: 33%;" class="animate-float-delayed"></div>
        </div>

        <!-- SVG Grid -->
        <svg class="hero-svg" style="mask-image: linear-gradient(to bottom, black 0%, black 60%, transparent 100%); -webkit-mask-image: linear-gradient(to bottom, black 0%, black 60%, transparent 100%);">
            <defs>
                <pattern id="hero-grid" width="60" height="60" patternUnits="userSpaceOnUse">
                    <path d="M 60 0 L 0 0 0 60" fill="none" stroke="#2563EB" stroke-width="0.5" />
                </pattern>
                <pattern id="hero-grid-lg" width="240" height="240" patternUnits="userSpaceOnUse">
                    <path d="M 240 0 L 0 0 0 240" fill="none" stroke="#2563EB" stroke-width="1" />
                </pattern>
                <radialGradient id="dot-glow" cx="50%" cy="50%" r="50%">
                    <stop offset="0%" stop-color="#2563EB" stop-opacity="1" />
                    <stop offset="30%" stop-color="#2563EB" stop-opacity="0.7" />
                    <stop offset="100%" stop-color="#2563EB" stop-opacity="0" />
                </radialGradient>
                <radialGradient id="dot-glow-light" cx="50%" cy="50%" r="50%">
                    <stop offset="0%" stop-color="#3B82F6" stop-opacity="1" />
                    <stop offset="30%" stop-color="#3B82F6" stop-opacity="0.7" />
                    <stop offset="100%" stop-color="#3B82F6" stop-opacity="0" />
                </radialGradient>
            </defs>
            <rect width="100%" height="100%" fill="url(#hero-grid)" />
            <rect width="100%" height="100%" fill="url(#hero-grid-lg)" />
            <!-- Vertical glow pulses -->
            <circle r="6" fill="url(#dot-glow)" opacity="0.4">
                <animateMotion dur="14s" repeatCount="indefinite" path="M120,0 L120,900" />
                <animate attributeName="opacity" values="0;0.4;0.4;0" dur="14s" repeatCount="indefinite" />
            </circle>
            <circle r="5" fill="url(#dot-glow-light)" opacity="0.3">
                <animateMotion dur="17s" repeatCount="indefinite" path="M400,0 L400,900" begin="4s" />
                <animate attributeName="opacity" values="0;0.35;0.35;0" dur="17s" repeatCount="indefinite" begin="4s" />
            </circle>
            <circle r="5.5" fill="url(#dot-glow)" opacity="0.3">
                <animateMotion dur="20s" repeatCount="indefinite" path="M680,0 L680,900" begin="7s" />
                <animate attributeName="opacity" values="0;0.3;0.3;0" dur="20s" repeatCount="indefinite" begin="7s" />
            </circle>
            <!-- Horizontal glow pulses -->
            <circle r="6" fill="url(#dot-glow)" opacity="0.35">
                <animateMotion dur="16s" repeatCount="indefinite" path="M0,80 L1600,80" />
                <animate attributeName="opacity" values="0;0.3;0.3;0" dur="16s" repeatCount="indefinite" />
            </circle>
            <circle r="5" fill="url(#dot-glow-light)" opacity="0.3">
                <animateMotion dur="18s" repeatCount="indefinite" path="M0,200 L1600,200" begin="5s" />
                <animate attributeName="opacity" values="0;0.28;0.28;0" dur="18s" repeatCount="indefinite" begin="5s" />
            </circle>
            <!-- Curve-following dots -->
            <path id="curve1" d="M0,100 Q200,60 400,120 T800,80 T1200,110 T1600,70" fill="none" stroke="#2563EB" stroke-width="0.8" opacity="0.25" />
            <circle r="8" fill="url(#dot-glow)" opacity="0.4">
                <animateMotion dur="10s" repeatCount="indefinite" rotate="auto">
                    <mpath href="#curve1" />
                </animateMotion>
                <animate attributeName="opacity" values="0;0.45;0.45;0" dur="10s" repeatCount="indefinite" />
            </circle>
            <!-- Pulsing dots -->
            <circle cx="400" cy="100" r="2.5" fill="#2563EB" opacity="0.3">
                <animate attributeName="opacity" values="0.1;0.35;0.1" dur="8s" repeatCount="indefinite" />
            </circle>
            <circle cx="800" cy="60" r="3" fill="#3B82F6" opacity="0.25">
                <animate attributeName="opacity" values="0.1;0.3;0.1" dur="10s" repeatCount="indefinite" begin="2s" />
            </circle>
        </svg>

        <!-- Decorative blobs -->
        <div style="position: absolute; top: -128px; right: -128px; width: 500px; height: 500px; border-radius: 50%; pointer-events: none; background: radial-gradient(circle, rgba(37, 99, 235, 0.08) 0%, transparent 70%);"></div>
        <div style="position: absolute; bottom: -64px; left: 0; width: 400px; height: 400px; border-radius: 50%; pointer-events: none; background: radial-gradient(circle, rgba(37, 99, 235, 0.05) 0%, transparent 70%);"></div>

        <div class="hero-content">
            <!-- Left -->
            <div class="hero-left">
                <div class="hero-badge">
                    <div class="hero-badge-dot"></div>
                    <span class="hero-badge-text">Gestion d'élevage moderne</span>
                </div>
                <h1 class="hero-title">
                    La plateforme complète de
                    <span class="hero-gradient-text">gestion cunicole</span>
                </h1>
                <p class="hero-description">
                    Gérez intelligemment votre cheptel lapin. Suivez vos reproductions, naissances,
                    et performances en toute simplicité depuis un seul tableau de bord.
                </p>
                <div class="hero-buttons">
                    <a href="{{ route('connect') }}#register" class="btn-hero-primary">
                        Essai gratuit 14 jours
                        <i class="bi bi-arrow-right"></i>
                    </a>
                    <a href="#features" class="btn-hero-secondary">
                        En savoir plus
                    </a>
                </div>
                <div class="hero-trust">
                    <div class="hero-trust-item">
                        <i class="bi bi-shield-check icon-green"></i>
                        <span>Essai 14 jours</span>
                    </div>
                    <div class="hero-trust-item">
                        <i class="bi bi-lightning icon-orange"></i>
                        <span>Sans carte bancaire</span>
                    </div>
                </div>
            </div>

            <!-- Right - Illustration -->
            <div class="hero-right">
                <div class="hero-illustration">
                    <div class="hero-illustration-bg"></div>
                    <div class="hero-illustration-bg-2"></div>
                    <div class="hero-card">
                        <div class="hero-card-content">
                            <div style="text-align: center;">
                                <div class="hero-card-icon">
                                    <i class="bi bi-grid-3x3-gap"></i>
                                </div>
                                <div class="hero-card-text">
                                    <p>Votre Hub de Gestion d'Élevage</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Floating stats -->
                    <div class="hero-float-stat hero-float-stat-left animate-float">
                        <div class="float-stat-icon green">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div>
                            <div class="float-stat-label">Éleveurs actifs</div>
                            <div class="float-stat-value">500+</div>
                        </div>
                    </div>
                    <div class="hero-float-stat hero-float-stat-right animate-float-delayed">
                        <div class="float-stat-icon blue">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <div>
                            <div class="float-stat-label">Satisfaction</div>
                            <div class="float-stat-value">98%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-divider">
        <div class="section-divider-line"></div>
    </div>

    <!-- ==================== FEATURES ==================== -->
    <div class="section-reveal" id="features">
        <div class="features-section">
            <!-- Floating bubbles -->
            <div class="features-bubbles">
                <div class="particle" style="width: 64px; height: 64px; border-radius: 50%; background: rgba(37, 99, 235, 0.05); border: 1px solid rgba(37, 99, 235, 0.1); bottom: -32px; left: 10%;" class="animate-float"></div>
                <div class="particle" style="width: 48px; height: 48px; border-radius: 50%; background: rgba(59, 130, 246, 0.08); border: 1px solid rgba(37, 99, 235, 0.05); bottom: 20%; left: 25%;" class="animate-float-delayed"></div>
                <div class="particle" style="width: 80px; height: 80px; border-radius: 50%; background: rgba(37, 99, 235, 0.04); border: 1px solid rgba(37, 99, 235, 0.08); top: -40px; right: 15%;" class="animate-float"></div>
            </div>
            <div class="features-glow"></div>

            <div class="section-header">
                <span class="section-badge">Fonctionnalités</span>
                <h2 class="section-title">Tout ce dont votre élevage a besoin</h2>
                <p class="section-description">
                    Des fonctionnalités puissantes conçues pour simplifier chaque aspect de la gestion de votre cheptel lapin.
                </p>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-egg-fried"></i>
                    </div>
                    <h3 class="feature-title">Suivi des Reproductions</h3>
                    <p class="feature-description">
                        Gérez les saillies, palpations et suivez les gestations en temps réel avec des alertes automatiques.
                    </p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-clipboard2-pulse"></i>
                    </div>
                    <h3 class="feature-title">Gestion des Naissances</h3>
                    <p class="feature-description">
                        Enregistrez les mises bas, suivez la mortalité et monitorer la croissance de vos lapereaux.
                    </p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-rabbit"></i>
                    </div>
                    <h3 class="feature-title">Inventaire Complet</h3>
                    <p class="feature-description">
                        Base de données détaillée de tous vos lapins avec codes uniques, photos et historique médical.
                    </p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-bar-chart-line"></i>
                    </div>
                    <h3 class="feature-title">Tableau de Bord Intelligent</h3>
                    <p class="feature-description">
                        Statistiques en temps réel, graphiques de performance et indicateurs clés pour vos décisions.
                    </p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-currency-exchange"></i>
                    </div>
                    <h3 class="feature-title">Gestion des Ventes</h3>
                    <p class="feature-description">
                        Suivez vos ventes, générez des factures et gérez les paiements en un clin d'œil.
                    </p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <h3 class="feature-title">Sécurisé & Fiable</h3>
                    <p class="feature-description">
                        Sécurité de niveau entreprise avec sauvegardes automatiques et vérification par email.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="section-divider">
        <div class="section-divider-line"></div>
    </div>

    <!-- ==================== PRICING ==================== -->
    <div class="section-reveal" id="pricing">
        <div class="pricing-section">
            <div class="section-header">
                <span class="section-badge">Tarifs</span>
                <h2 class="section-title">Des prix simples et transparents</h2>
                <p class="section-description">
                    Choisissez le plan qui correspond à votre élevage. Tous les plans incluent un essai gratuit de 14 jours.
                </p>
            </div>

            <div class="pricing-grid">
                @php
                    $plans = \App\Models\SubscriptionPlan::where('is_active', true)->orderBy('duration_months')->get();
                @endphp

                @foreach ($plans as $index => $plan)
                    <div class="pricing-card {{ $plan->duration_months === 12 ? 'popular' : '' }}">
                        @if ($plan->duration_months === 12)
                            <div class="pricing-popular-badge">
                                <i class="bi bi-star-fill"></i>
                                Meilleure Offre
                            </div>
                        @endif

                        <h3 class="pricing-name">{{ $plan->name }}</h3>
                        <div class="pricing-price">
                            <span class="pricing-amount">
                                @if ($plan->price <= 0)
                                    Gratuit
                                @else
                                    {{ number_format($plan->price, 0, ',', ' ') }}
                                @endif
                            </span>
                            @if ($plan->price > 0)
                                <span class="pricing-period">FCFA</span>
                            @endif
                        </div>

                        <ul class="pricing-features">
                            @if ($plan->duration_months > 0)
                                <li class="pricing-feature">
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>{{ $plan->duration_months }} mois d'accès</span>
                                </li>
                            @else
                                <li class="pricing-feature">
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>14 jours d'essai</span>
                                </li>
                            @endif
                            <li class="pricing-feature">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Jusqu'à {{ $plan->max_users ?? 5 }} utilisateurs</span>
                            </li>
                            @if (is_array($plan->features))
                                @foreach (array_slice($plan->features, 0, 3) as $feature)
                                    <li class="pricing-feature">
                                        <i class="bi bi-check-circle-fill"></i>
                                        <span>{{ $feature }}</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>

                        <a href="{{ route('connect') }}#register" class="pricing-cta">
                            @if ($plan->price <= 0)
                                Commencer l'essai
                            @else
                                S'abonner
                            @endif
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="section-divider">
        <div class="section-divider-line"></div>
    </div>

    <!-- ==================== CTA ==================== -->
    <div class="section-reveal">
        <div class="cta-section">
            <div class="cta-card">
                <div class="cta-bg-blob-1"></div>
                <div class="cta-bg-blob-2"></div>
                <div class="cta-dots">
                    <svg class="w-full h-full" viewBox="0 0 400 300">
                        <defs>
                            <pattern id="cta-dots-pattern" width="20" height="20" patternUnits="userSpaceOnUse">
                                <circle cx="2" cy="2" r="1" fill="white" />
                            </pattern>
                        </defs>
                        <rect width="400" height="300" fill="url(#cta-dots-pattern)" />
                    </svg>
                </div>
                <div class="cta-content">
                    <h2 class="cta-title">Prêt à moderniser votre élevage ?</h2>
                    <p class="cta-description">
                        Rejoignez des centaines d'éleveurs qui utilisent déjà CuniApp pour optimiser leurs opérations.
                        Commencez votre essai gratuit de 14 jours dès aujourd'hui.
                    </p>
                    <div class="cta-buttons">
                        <a href="{{ route('connect') }}#register" class="btn-cta-primary">
                            Essai gratuit 14 jours
                        </a>
                        <a href="{{ route('connect') }}" class="btn-cta-secondary">
                            Se connecter
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== FOOTER ==================== -->
    <footer class="landing-footer">
        <div class="footer-container">
            <div class="footer-brand">
                <div class="footer-logo">
                    <svg viewBox="0 0 40 40" fill="none">
                        <path d="M20 5L35 15V25L20 35L5 25V15L20 5Z" fill="white" />
                        <path d="M20 12L28 17V23L20 28L12 23V17L20 12Z" fill="rgba(255,255,255,0.8)" />
                    </svg>
                </div>
                <span class="footer-brand-text">CuniApp</span>
            </div>
            <div class="footer-copyright">
                &copy; {{ date('Y') }} CuniApp. Tous droits réservés.
            </div>
            <div class="footer-links">
                <a href="{{ route('terms') }}" class="footer-link">Conditions d'utilisation</a>
                <a href="{{ route('privacy') }}" class="footer-link">Politique de confidentialité</a>
            </div>
        </div>
    </footer>

    <script>
        // Navbar scroll effect
        const nav = document.getElementById('landingNav');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });

        // Section reveal on scroll
        const revealElements = document.querySelectorAll('.section-reveal');
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        revealElements.forEach(el => revealObserver.observe(el));
    </script>
</body>

</html>
