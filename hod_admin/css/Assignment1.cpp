/*Name :-Sampada Dhande
Roll no:-21
*/


#include<iostream>
using namespace std;

int main()
{
   int start,end,mid,n,key,i,count;
   int a[14]={-15,-6,0,7,9,23,54,82,101,112,125,131,142,151};
   n=14;
   start=0;
   end=(n-1);
   
   cout<<"Enter the key you want to search:";
   cin>>key;
   
   
      if(start==end)
      {
         cout<<"Element found: "<<a[start]<<endl;
         
      }
   for(i=0;i<n;i++)
   {
         if(i==(n-1))
         {
            cout<<"Element is not present in array\n";
         }
         mid=(start+end)/2;
         if(key==a[mid])
         {
             cout<<"Element found: "<<a[mid]<<" at "<<(mid)<<" position "<<endl;
             cout<<"Array divided "<<i+1<<" times"<<endl;
            
             break;
         }
         else if(key>a[mid])
         {
             start=mid+1;
             
         }
         else if(key<a[mid])
         {
            end=mid;
            
         }
              
   }
   
   return 0;
}

/*
Enter the key you want to search:125
Element found: 125 at 10 position 
Array divided 2 times
*/