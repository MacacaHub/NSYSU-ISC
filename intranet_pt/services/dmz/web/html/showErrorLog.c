#include <unistd.h>
#include <stdlib.h>

int main(){
	setuid(0);
	setgid(0);
	system("tail /var/log/apache2/error.log");
	return 0;
}
