const quotes = [
    "The greatest glory in living lies not in never falling, but in rising every time we fall. - Nelson Mandela",
    "The way to get started is to quit talking and begin doing. - Walt Disney",
    "Life is what happens when you're busy making other plans. - John Lennon",
    "The future belongs to those who believe in the beauty of their dreams. - Eleanor Roosevelt",
    "You miss 100% of the shots you don't take. - Wayne Gretzky",
    "The only limit to our realization of tomorrow will be our doubts of today. - Franklin D. Roosevelt",
    "It always seems impossible until it's done. - Nelson Mandela",
    "Your time is limited, don't waste it living someone else's life. - Steve Jobs",
    "The only way to do great work is to love what you do. - Steve Jobs",
    "In the end, it's not the years in your life that count. It's the life in your years. - Abraham Lincoln",
    "Life is 10% what happens to you and 90% how you react to it. - Charles R. Swindoll",
"Success is not final, failure is not fatal: It is the courage to continue that counts. - Winston Churchill",
"The only person you are destined to become is the person you decide to be. - Ralph Waldo Emerson",
"Don't watch the clock; do what it does. Keep going. - Sam Levenson",
"The only thing standing between you and your goal is the story you keep telling yourself as to why you can't achieve it. - Jordan Belfort",
"The best time to plant a tree was 20 years ago. The second best time is now. - Chinese Proverb",

"The future belongs to those who believe in the beauty of their dreams. - Eleanor Roosevelt",
"Believe you can and you're halfway there. - Theodore Roosevelt",
"The only impossible journey is the one you never begin. - Anthony Robbins"
];

const quoteElement = document.getElementById('quote');
const generateBtn = document.getElementById('generateBtn');
const storageKey = 'quoteData';

function generateQuote() {
    const randomIndex = Math.floor(Math.random() * quotes.length);
    const quoteText = quotes[randomIndex];
    const quoteData = {
        quote: quoteText,
        lastUpdated: Date.now()
    };
    localStorage.setItem(storageKey, JSON.stringify(quoteData));
    quoteElement.textContent = quoteText;
}

function getStoredQuote() {
    const storedData = localStorage.getItem(storageKey);
    if (storedData) {
        const quoteData = JSON.parse(storedData);
        const lastUpdated = new Date(quoteData.lastUpdated);
        const currentTime = Date.now();
        const timeDiff = currentTime - lastUpdated.getTime();
        const twentyFourHours = 24 * 60 * 60 * 1000; // 24 hours in milliseconds
        if (timeDiff >= twentyFourHours) {
            generateQuote();
        } else {
            quoteElement.textContent = quoteData.quote;
        }
    } else {
        generateQuote();
    }
}

generateBtn.addEventListener('click', generateQuote);

// Generate a quote on page load or refresh after 24 hours
getStoredQuote();