new SmartBanner({
    daysHidden: 0,   // days to hide banner after close button is clicked (defaults to 15)
    daysReminder: 0, // days to hide banner after "VIEW" button is clicked (defaults to 90)
    appStoreLanguage: 'us', // language code for the App Store (defaults to us)
    title: 'NBKC Mobile Banking',
    author: 'NBKC Bank',
    button: 'VIEW',
    store: {
        ios: 'On the App Store',
        android: 'In Google Play'
    },
    price: {
        ios: 'FREE',
        android: 'FREE'
    }
});