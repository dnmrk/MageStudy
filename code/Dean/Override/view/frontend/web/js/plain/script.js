let a = {
    trigger: () => {
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                let a = 1 + 1;
                if (a == 2) {
                    resolve('yes');
                } else {
                    reject('no');
                }
            }, 5000);
        });
    }
}


let ret = a.trigger();
ret.then((message) => {
    console.log('This is in the then ' + message)
}).catch((message) => {
    console.log('This is in the catch ' + message)
})
console.log('end');
