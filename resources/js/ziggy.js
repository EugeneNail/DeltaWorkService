const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"landing.index":{"uri":"landing","methods":["GET","HEAD"]},"landing.create":{"uri":"landing\/create","methods":["GET","HEAD"]},"landing.store":{"uri":"landing","methods":["POST"]},"landing.edit":{"uri":"landing\/{landing}\/edit","methods":["GET","HEAD"]},"landing.update":{"uri":"landing\/{landing}","methods":["PUT","PATCH"]},"landing.destroy":{"uri":"landing\/{landing}","methods":["DELETE"]},"user.profile":{"uri":"user\/profile","methods":["GET","HEAD"]},"user.profile.update":{"uri":"user\/profile\/update","methods":["POST"]},"user.dashboard":{"uri":"user\/dashboard","methods":["GET","HEAD"]},"admin.dashboard.index":{"uri":"admin\/dashboard","methods":["GET","HEAD"]},"admin.services.index":{"uri":"admin\/services","methods":["GET","HEAD"]},"admin.services.create":{"uri":"admin\/services\/create","methods":["GET","HEAD"]},"admin.services.store":{"uri":"admin\/services","methods":["POST"]},"admin.services.edit":{"uri":"admin\/services\/{service}\/edit","methods":["GET","HEAD"],"bindings":{"service":"id"}},"admin.services.update":{"uri":"admin\/services\/{service}","methods":["PUT","PATCH"],"bindings":{"service":"id"}},"admin.services.destroy":{"uri":"admin\/services\/{service}","methods":["DELETE"],"bindings":{"service":"id"}},"admin.cities.index":{"uri":"admin\/cities","methods":["GET","HEAD"]},"admin.cities.create":{"uri":"admin\/cities\/create","methods":["GET","HEAD"]},"admin.cities.store":{"uri":"admin\/cities","methods":["POST"]},"admin.cities.edit":{"uri":"admin\/cities\/{city}\/edit","methods":["GET","HEAD"],"bindings":{"city":"id"}},"admin.cities.update":{"uri":"admin\/cities\/{city}","methods":["PUT","PATCH"],"bindings":{"city":"id"}},"admin.cities.destroy":{"uri":"admin\/cities\/{city}","methods":["DELETE"],"bindings":{"city":"id"}},"admin.users.index":{"uri":"admin\/users","methods":["GET","HEAD"]},"admin.users.create":{"uri":"admin\/users\/create","methods":["GET","HEAD"]},"admin.users.store":{"uri":"admin\/users","methods":["POST"]},"admin.users.edit":{"uri":"admin\/users\/{user}\/edit","methods":["GET","HEAD"],"bindings":{"user":"id"}},"admin.users.update":{"uri":"admin\/users\/{user}","methods":["PUT","PATCH"],"bindings":{"user":"id"}},"admin.users.destroy":{"uri":"admin\/users\/{user}","methods":["DELETE"],"bindings":{"user":"id"}},"admin.passport.index":{"uri":"admin\/passport","methods":["GET","HEAD"]},"admin.passport.create":{"uri":"admin\/passport\/create","methods":["GET","HEAD"]},"admin.passport.store":{"uri":"admin\/passport","methods":["POST"]},"admin.passport.edit":{"uri":"admin\/passport\/{passport}\/edit","methods":["GET","HEAD"]},"admin.passport.update":{"uri":"admin\/passport\/{passport}","methods":["PUT","PATCH"]},"admin.passport.destroy":{"uri":"admin\/passport\/{passport}","methods":["DELETE"]},"admin.quality.index":{"uri":"admin\/quality","methods":["GET","HEAD"]},"admin.quality.create":{"uri":"admin\/quality\/create","methods":["GET","HEAD"]},"admin.quality.store":{"uri":"admin\/quality","methods":["POST"]},"admin.quality.edit":{"uri":"admin\/quality\/{quality}\/edit","methods":["GET","HEAD"]},"admin.quality.update":{"uri":"admin\/quality\/{quality}","methods":["PUT","PATCH"]},"admin.quality.destroy":{"uri":"admin\/quality\/{quality}","methods":["DELETE"]},"admin.dashboard.create":{"uri":"admin\/dashboard\/create","methods":["GET","HEAD"]},"admin.dashboard.store":{"uri":"admin\/dashboard","methods":["POST"]},"admin.dashboard.edit":{"uri":"admin\/dashboard\/{dashboard}\/edit","methods":["GET","HEAD"]},"admin.dashboard.update":{"uri":"admin\/dashboard\/{dashboard}","methods":["PUT","PATCH"]},"admin.dashboard.destroy":{"uri":"admin\/dashboard\/{dashboard}","methods":["DELETE"]},"admin.review.index":{"uri":"admin\/review","methods":["GET","HEAD"]},"admin.review.create":{"uri":"admin\/review\/create","methods":["GET","HEAD"]},"admin.review.store":{"uri":"admin\/review","methods":["POST"]},"admin.review.edit":{"uri":"admin\/review\/{review}\/edit","methods":["GET","HEAD"]},"admin.review.update":{"uri":"admin\/review\/{review}","methods":["PUT","PATCH"]},"admin.review.destroy":{"uri":"admin\/review\/{review}","methods":["DELETE"]},"register":{"uri":"register","methods":["GET","HEAD"]},"login":{"uri":"login","methods":["GET","HEAD"]},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"]},"reset.password.complete":{"uri":"reset-password","methods":["POST"]},"reset.password":{"uri":"reset-password","methods":["GET","HEAD"]},"reset.password.code":{"uri":"reset-password-code","methods":["POST"]},"verification.notice":{"uri":"verify-email","methods":["GET","HEAD"]},"verification.verify":{"uri":"verify-email\/{id}\/{hash}","methods":["GET","HEAD"]},"verification.send":{"uri":"email\/verification-notification","methods":["POST"]},"password.confirm":{"uri":"confirm-password","methods":["GET","HEAD"]},"password.update":{"uri":"password","methods":["PUT"]},"logout":{"uri":"logout","methods":["GET","HEAD"]},"phone.verify":{"uri":"phone\/verification","methods":["POST"]},"after.verify":{"uri":"after\/verification","methods":["POST"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
