int equipeA[] = {0, 7, 5, 2};
int equipeB[] = {6, 1, 5};
int vet[4];
int i, j = 0;
int count = 0;
for (i = 0; i < 3; i++)
{
	if(equipeA[j] <= equipeB[i]){
		count++;
	}
	vet[j] = count;
	if (i<=3)
	{
		i=0;
	}
}