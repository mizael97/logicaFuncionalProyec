#include <stdio.h>
int main()
{
    int n, i;
    unsigned long long factorial = 1;

    printf("Introduce un entero: ");
    scanf("%d",&n);

   
    if (n < 0)
        printf("¡Error! El factorial de un número negativo no existe.");

    else
    {
        for(i=1; i<=n; ++i)
        {
            factorial *= i;              // factorial = factorial*i;
        }
        printf("Factorial de %d es %llu", n, factorial);
    }

    return 0;
}
